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
            <span>Asistencias</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo $this->menu_asistencias_diaria ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/asistenciadiaria"><i class="fa fa-angle-double-right"></i> Asistencia Diaria </a></li>
            <li class="<?php echo $this->menu_asistencias_consultas ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/asistencias/admin"><i class="fa fa-angle-double-right"></i> Consultas </a></li>
            <li class="<?php echo $this->menu_asistencias_exportar ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/asistencias/exportar"><i class="fa fa-angle-double-right"></i> Exportar </a></li>
            <li class="<?php echo $this->menu_asistencias_domingos ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/domingos"><i class="fa fa-angle-double-right"></i> Domingos </a></li>
        </ul>
    </li>

    <li class="treeview <?php echo $this->menu_comidas ?>">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/comidas">
            <i class="glyphicon glyphicon-cutlery"></i>
            <span>Comedor</span><i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li class="<?php echo $this->menu_comidas_control ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/personal/comidas"><i class="fa fa-angle-double-right"></i> Control </a>
            </li>
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

                <li class="<?php echo $this->menu_horarios_cargar ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/horarios/cargarHorario"><i class="fa fa-angle-double-right"></i> Cargar </a>
                </li>

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

        <li class="treeview <?php echo $this->menu_personal ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/log/logView">
            <i class="fa fa-file-text-o"></i>
                <span>Log file</span>
            </a>
        </li>

        <li class="treeview <?php echo $this->menu_sectores ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/sectores/admin">
                <i class="fa fa-fw fa-flag-o"></i>
                <span>Sectores</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_sectores_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/sectores/create"><i class="fa fa-angle-double-right"></i> Nuevo Sector</a></li>
                <li class="<?php echo $this->menu_sectores_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/sectores/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_frecuencias ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/frecuencias/admin">
                <i class="fa fa-fw fa-arrows-h"></i>
                <span>Frecuencias</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_frecuencias_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/frecuencias/create"><i class="fa fa-angle-double-right"></i> Nueva Frecuencia</a></li>
                <li class="<?php echo $this->menu_frecuencias_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/frecuencias/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_estados ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/estados/admin">
                <i class="fa fa-fw fa-navicon"></i>
                <span>Estados</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_estados_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/estados/create"><i class="fa fa-angle-double-right"></i> Nuevo Estado</a></li>
                <li class="<?php echo $this->menu_estados_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/estados/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_proveedores ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/proveedores/admin">
                <i class="fa fa-building-o"></i>
                <span>Proveedores</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_proveedores_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/proveedores/create"><i class="fa fa-angle-double-right"></i> Nuevo Proveedor</a></li>
                <li class="<?php echo $this->menu_proveedores_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/proveedores/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_puestos ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/puestos/admin">
                <i class="fa fa-desktop"></i>
                <span>Puestos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_puestos_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/puestos/create"><i class="fa fa-angle-double-right"></i> Nuevo Puesto</a></li>
                <li class="<?php echo $this->menu_puestos_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/puestos/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_archivo ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/puertos/admin">
                <i class="fa fa-fw fa-archive"></i>
                <span>Archivo</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_archivo_asistencias ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/asistencias/archivoAsistencias"><i class="fa fa-angle-double-right"></i> Asistencias</a>
                </li>
                <li class="<?php echo $this->menu_archivo_tickets ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tickets/archivoTickets"><i class="fa fa-angle-double-right"></i> Tickets</a>
                </li>
                <li class="<?php echo $this->menu_archivo_horarios ?>">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/horarios/archivoHorarios"><i class="fa fa-angle-double-right"></i> Horarios</a>
                </li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_noticias ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/noticias/admin">
                <i class="fa fa-fw fa-newspaper-o"></i>
                <span>Noticias</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_noticias_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/noticias/create"><i class="fa fa-angle-double-right"></i> Nueva Noticia</a></li>
                <li class="<?php echo $this->menu_noticias_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/noticias/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_reglamentos ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/reglamentos/admin">
                <i class="fa fa-fw fa-legal"></i>
                <span>Reglamentos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_reglamentos_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/reglamentos/create"><i class="fa fa-angle-double-right"></i> Nuevo Reglamento</a></li>
                <li class="<?php echo $this->menu_reglamentos_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/reglamentos/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

        <li class="treeview <?php echo $this->menu_formularios ?>">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/formularios/admin">
                <i class="fa fa-fw fa-edit"></i>
                <span>Formularios</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_formularios_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/formularios/create"><i class="fa fa-angle-double-right"></i> Nuevo Formulario</a></li>
                <li class="<?php echo $this->menu_formularios_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/formularios/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
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

        <li class="treeview <?php echo $this->menu_usuarios ?>">
            <a href="#">
                <i class="fa fa-fw fa-user"></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $this->menu_usuarios_n ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/usuario/create"><i class="fa fa-angle-double-right"></i> Nuevo Usuario</a></li>
                <li class="<?php echo $this->menu_usuarios_l ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/usuario/admin"><i class="fa fa-angle-double-right"></i> Listado</a></li>
            </ul>
        </li>

    </ul>