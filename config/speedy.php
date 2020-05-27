<?php

    return [

        /**
         * -----------------------------------------------------------------------------------------------------------------
         *  Models config
         * -----------------------------------------------------------------------------------------------------------------
         *
         * config your namespace and model's Class name
         *
         */

        'class' => [
            'namespace' => 'App\\Models\\' ,
            'model'     => [
                'role'                     => 'Role' ,
                'user'                     => 'AdminUser' ,
                'permission'               => 'Permission' ,
                'permission_role'          => 'PermissionRole' ,
                'equip' => 'Equips',
                'user_equip_ref' => 'UserEquipRef',
            ] ,
        ] ,

        /**
         * -----------------------------------------------------------------------------------------------------------------
         *  Table config
         * -----------------------------------------------------------------------------------------------------------------
         *
         * config your table name
         *
         */

        'table' => [
            'role'                     => 'role' ,
            'permission'               => 'permission' ,
            'user'                     => 'pt_user' ,
            'permission_role'          => 'permission_role' ,
            'equip' => 't_station_data_1min',
            'user_equip_ref' => 't_user_api',
        ] ,

        /**
         * -----------------------------------------------------------------------------------------------------------------
         *  Menus config
         * -----------------------------------------------------------------------------------------------------------------
         *
         * config your sidebar menu here
         *
         */

    ];