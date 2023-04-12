          <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <li class="<?php echo $this->menu_home ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin">
                    <i class="fa fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="treeview <?php echo $this->menu_asistencias ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/personal/admin">
                   <i class="fa fa-fw fa-calendar"></i>
                    <span>Asistencias</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $this->menu_asistencias ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/asistenciadiariasector"><i class="fa fa-angle-double-right"></i> Asistencia Diaria </a></li>
                </ul>
            </li>

            <li class="<?php echo $this->menu_personal ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/personalSector">
                    <i class="fa fa-fw fa-users"></i>
                    <span>Personal</span>
                </a>
            </li>


          </ul>