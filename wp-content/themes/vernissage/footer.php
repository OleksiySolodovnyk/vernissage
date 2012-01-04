        <div id="footer">
            <?php 
            $lng = qtrans_getLanguage();
            if ($lng == "ru")
            {
                wp_nav_menu( array( 'menu' => 'secondary_ru', 'container_class' => 'sub_menu') );
            }
            else if ($lng == "en")
            {
                wp_nav_menu( array( 'menu' => 'secondary_en', 'container_class' => 'sub_menu') );
            }
            else if ($lng == "fr")
            {
                wp_nav_menu( array( 'menu' => 'secondary_fr', 'container_class' => 'sub_menu') );
            }
            ?>
            <div id="copyright">
                <p>Copyright © 2011 Vernissage</p>
                <p>Все права защищены.</p>
            </div>
            <div id="f-contacts">
                <span>0923 УКРАИНА, КИЕВ</span>
                <p>ул. Лисенка 4</p>
                <p>+38044 236 03016</p>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>