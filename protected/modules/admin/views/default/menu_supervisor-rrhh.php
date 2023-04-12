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
                    <li class="<?php echo $this->menu_asistencias_diaria ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/asistenciadiaria"><i class="fa fa-angle-double-right"></i> Asistencia Diaria </a></li>
                    <li class="<?php echo $this->menu_asistencias_consultas ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/asistencias/admin"><i class="fa fa-angle-double-right"></i> Consultas </a></li>
                    <li class="<?php echo $this->menu_asistencias_exportar ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/asistencias/exportar"><i class="fa fa-angle-double-right"></i> Exportar </a></li>
                    <li class="<?php echo $this->menu_asistencias_domingos ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/domingos"><i class="fa fa-angle-double-right"></i> Domingos </a></li>
                </ul>
            </li>


            <li class="treeview <?php echo $this->menu_personal ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/puertos/admin">
                   <i class="fa fa-fw fa-users"></i>
                    <span>Personal</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $this->menu_personal_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/create"><i class="fa fa-angle-double-right"></i> Nuevo </a></li>
                    <li class="<?php echo $this->menu_personal_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
                </ul>
            </li>

            <li class="treeview <?php echo $this->menu_comidas ?>">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/comidas">
                    <i class="glyphicon glyphicon-cutlery"></i>
                    <span>Comedor</span><i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="<?php echo $this->menu_comidas_control ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/comidas"><i class="fa fa-angle-double-right"></i> Control </a></li>
                    <li class="<?php echo $this->menu_tickets ?>">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tickets/admin"><i class="fa fa-angle-double-right"></i> Tickets </a>
                    </li>
                    <li class="<?php echo $this->menu_carga ?>">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/carga"><i class="fa fa-angle-double-right"></i> Carga masiva </a>
                    </li>
                    <li class="<?php echo $this->menu_comidas_parametros ?>">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/configComedor/update/1"><i class="fa fa-angle-double-right"></i> Parámetros </a>
                    </li>
                </ul>
            </li>

        <li class="treeview <?php echo $this->menu_horarios ?>">
            <a href="">
                <i class="glyphicon glyphicon-time"></i>
                <span>Control Horario</span><i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_horarios_registros ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/horarios/admin">
                    <i class="fa fa-angle-double-right"></i> Registros </a>
                </li>

                <li class="<?php echo $this->menu_horarios_control ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/horarios/controlHorario">
                    <i class="fa fa-angle-double-right"></i> Control </a>
                </li>                

                <li class="<?php echo $this->menu_horarios_exportar ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/horarios/exportar"><i class="fa fa-angle-double-right"></i> Exportar </a>
                </li>

            </ul>
        </li>

    <li class="treeview <?php echo $this->menu_internos ?>">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/internos/admin">
           <i class="fa fa-fw fa-phone"></i>
            <span>Internos</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo $this->menu_internos_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/internos/create"><i class="fa fa-angle-double-right"></i> Nuevo Interno</a></li>
            <li class="<?php echo $this->menu_internos_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/internos/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
        </ul>
    </li>


          </ul>