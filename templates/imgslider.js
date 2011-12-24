function track_event(){
  if (typeof(pageTracker) != "undefined"){
    pageTracker._trackEvent.apply(window, arguments);
  }
}

(function(){
  var cache = {};
  
  this.tmpl = function tmpl(str, data){
    // Figure out if we're getting a template, or if we need to
    // load the template - and be sure to cache the result.
    var fn = !/\W/.test(str) ?
      cache[str] = cache[str] ||
        tmpl(str) :
      
      // Generate a reusable function that will serve as a template
      // generator (and which will be cached).
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +
        
        // Introduce the data as local variables using with(){}
        "with(obj){p.push('" +
        
        // Convert the template into pure JavaScript
        str
          .replace(/[\r\t\n]/g, " ")
          .split("<%").join("\t")
          .replace(/((^|%>)[^\t]*)'/g, "$1\r")
          .replace(/\t=(.*?)%>/g, "',$1,'")
          .split("\t").join("');")
          .split("%>").join("p.push('")
          .split("\r").join("\\'")
      + "');}return p.join('');");
    
    // Provide some basic currying to the user
    return data ? fn( data ) : fn;
  };
})();

(function(){
  var initializing = false, fnTest = /xyz/.test(function(){xyz;}) ? /\b_super\b/ : /.*/;
  // The base Class implementation (does nothing)
  this._Class = function(){};
  
  // Create a new Class that inherits from this class
  _Class.extend = function(prop) {
    var _super = this.prototype;
    
    // Instantiate a base class (but only create the instance,
    // don't run the init constructor)
    initializing = true;
    var prototype = new this();
    initializing = false;
    
    // Copy the properties over onto the new prototype
    for (var name in prop) {
      // Check if we're overwriting an existing function
      prototype[name] = typeof prop[name] == "function" && 
        typeof _super[name] == "function" && fnTest.test(prop[name]) ?
        (function(name, fn){
          return function() {
            var tmp = this._super;
            
            // Add a new ._super() method that is the same method
            // but on the super-class
            this._super = _super[name];
            
            // The method only need to be bound temporarily, so we
            // remove it when we're done executing
            var ret = fn.apply(this, arguments);        
            this._super = tmp;
            
            return ret;
          };
        })(name, prop[name]) :
        prop[name];
    }
    
    // The dummy class constructor
    function _Class() {
      // All construction is actually done in the init method
      if ( !initializing && this.init )
        this.init.apply(this, arguments);
    }
    
    // Populate our constructed prototype object
    _Class.prototype = prototype;
    
    // Enforce the constructor to be what we expect
    _Class.constructor = _Class;

    // And make this class extendable
    _Class.extend = arguments.callee;
    
    return _Class;
  };
})();

(function( $ ){

  var OPTIONS = {
    classname: "b-slideshow",
    rootClass: ".b-slideshow",

    force: false,
    selfEvent: true,
    expanded: false,
    
    animation: "fade",
    speed: 300,
    title: "",
    fx: {},

    template: tmpl(
      
      '<div class="<%=classname%>-photos">' +
      '</div>'+
      '<div class="<%=classname%>-controls">' +
        '<h4 class="title"><%=title%></h4>' +
        '<div class="left"></div>' +
        '<div class="status"><%=status%></div>' +
        '<div class="right"></div>' +
        //'<div class="expand"><a class="g-pseudo-link" href="#"><span>показать все</span></a></div>' +
        '<div class="clear"><div></div></div>' +
      '</div>'
    ),
    
    statusTemplate: tmpl("<%=current%> / <%=count%>")
  };
  
  OPTIONS.fx.none = function(prev, next){
    prev.hide();
    next.show();
    console.log("none");
  };
  
  OPTIONS.fx.fade = function(prev, next){
    var self = this;
    next.show().css({ position: "absolute", left: "0", top: "0", opacity: "0" });
    this.photosNode.css({ height: Math.max(prev.outerHeight(), next.outerHeight()) })
    prev.animate({ opacity: 0 }, OPTIONS.speed);
    next.animate({ opacity: 1 }, OPTIONS.speed, function(){
      self.photosNode.css({ height: next.outerHeight() })
      prev.hide();
      next.removeAttr("style");
    });
  }
  
  $(document).ready(function(){
    $(OPTIONS.rootClass).each(function(){
      new bSlideShow( this );
    })
  });
  
  var bSlideShow = _Class.extend({
    init: function( node ){
      this.domNode = $(node);
      if(this.create()){
        this.bindEvents();
      }
    },
    
    create: function(){
      this.photos = this.domNode.children().hide().eq(0).show().end();
      
      this.OPTIONS = $.extend(true, {}, OPTIONS)
      try{
        var o = this.domNode.attr("settings");
        if(o && o.length){
          o = eval('(' + o + ')');
          $.extend(true, this.OPTIONS, o);
        }
      } catch(e){ };

      if(this.photos.length <= 1 && !this.OPTIONS.force) return false;
      
      this.status = {
        count: this.photos.length,
        current: 1
      }

      var template = $(this.OPTIONS.template(
        $.extend( true, {}, this.OPTIONS, { status: this.OPTIONS.statusTemplate(this.status) } )
      ));

      this.domNode.append(template);
      this.photos.appendTo(template.filter(this.OPTIONS.rootClass + "-photos"));
      this.photosNode = this.domNode.find(this.OPTIONS.rootClass + "-photos");
      this.controlsNode = this.domNode.find(this.OPTIONS.rootClass + "-controls");
      
      if(this.photos.length <= 1) this.controlsNode.children().not(".title, .clear").hide();
      
      this.title = '';
      try{
        this.title = this.domNode.parents(".b-article").find("h1");
        if(this.title.length)
          this.title = this.title.eq(0).text();
      } catch(e){ }
      
      return true;
    },
    
    bindEvents: function(){
      var self = this;
      this.controlsNode
        .find(".left")
          .mousedown(function(){
            return false;
          })
          .click(function(){
            self.show( -1 );
            track_event('Slideshow', 'Prev', self.title, self.status.current);
            return false;
          })
          .end()
        .find(".right")
          .mousedown(function(){
            return false;
          })
          .click(function(){
            self.show( 1 );
            track_event('Slideshow', 'Next', self.title, self.status.current);
            return false;
          })
          .end()
        .find(".expand a")
          .click(function(){
            self.photos.removeAttr("style").show();
            self.photosNode.removeAttr("style");
            return false;
          })
          
      if(this.OPTIONS.selfEvent)
        this.photos
          .mousedown(function(){
            return false;
          })
          .click(function(){
            self.show( 1 );
            track_event('Slideshow', 'Next', self.title, self.status.current);
            return false;
          })
          
    },
    
    show: function( dir ){
      if(!dir) dir = 1;
      
      var prev = this.photos.eq(this.status.current-1);

      this.status.current += dir;
      if(this.status.current < 1) this.status.current = this.status.count;
      if(this.status.current > this.status.count) this.status.current = 1;
      this.controlsNode.find(".status").html( this.OPTIONS.statusTemplate(this.status) )
      
      var next = this.photos.eq(this.status.current-1);

      this.OPTIONS.fx[ this.OPTIONS.animation && $.isFunction(this.OPTIONS.fx[this.OPTIONS.animation]) ? this.OPTIONS.animation : "none" ].call(this, prev, next);
      
    }
    
  });
  
})( jQuery );