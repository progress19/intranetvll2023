          <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <li class="<?php echo $this->menu_home ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin">
                    <i class="fa fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>


            <li class=" <?php echo $this->menu_personal ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/pistas/admin">
                   <i class="fa fa-flag" aria-hidden="true"></i>
                    <span>Pistas</span>
                </a>
            </li>

          </ul>