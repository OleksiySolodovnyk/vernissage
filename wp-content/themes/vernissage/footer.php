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
                 <?php
                if ($lng == "ru") { ?>
                    <p>Copyright © 2011 Vernissage</p>
                    <p>Все права защищены.</p>
                <?php }
                else if ($lng == "en") { ?>
                    <p>Copyright © 2011 Vernissage</p>
                    <p>All rights reserved.</p>
                <?php }
                else if ($lng == "fr") { ?>
                    <p>Copyright © 2011 Vernissage</p>
                    <p>Tous droits réservés.</p>
                <?php } ?>
               
            </div>
            <div id="f-contacts">
                <?php
                if ($lng == "ru") { ?>
                    <span>0923 УКРАИНА, КИЕВ</span>
                    <p>ул. Лисенка 4</p>
                    <p>+38044 236 03016</p>
                <?php }
                else if ($lng == "en") { ?>
                    <span>0923 UKRAINE, KYIV</span>
                    <p>4 Lisenka St.</p>
                    <p>+38044 236 03016</p>
                <?php }
                else if ($lng == "fr") { ?>
                    <span>0923 UKRAINE, KYIV</span>
                    <p>4 Lisenka St.</p>
                    <p>+38044 236 03016</p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>