<?php

return array(
    // Admin
    'admin' => new Zend_Controller_Router_Route(
        'admin/:controller/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'index',
            'action'     => 'index',
        )
    ),
    'admin-intro' => new Zend_Controller_Router_Route(
        'admin/intro/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'intro',
            'action'     => 'redirect-edit',
        )
    ),
    'admin-featured-designer' => new Zend_Controller_Router_Route(
        'admin/featured-designer/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'featured-designer',
            'action'     => 'list',
        )
    ),
    'admin-featured-designer-view' => new Zend_Controller_Router_Route(
        'admin/featured-designer/view/:id',
        array(
            'module'     => 'admin',
            'controller' => 'featured-designer',
            'action'     => 'view',
            'format'     => 'html',
            'id'         => '',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-design-studio-collection' => new Zend_Controller_Router_Route(
        'admin/design-studio-collection/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'design-studio-collection',
            'action'     => 'list',
        )
    ),
    'admin-designer' => new Zend_Controller_Router_Route(
        'admin/designer/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'designer',
            'action'     => 'list',
        )
    ),
    'admin-user' => new Zend_Controller_Router_Route(
        'admin/user/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'user',
            'action'     => 'list',
        )
    ),
    'admin-user-info' => new Zend_Controller_Router_Route(
        'admin/user/info/*',
        array(
            'module'     => 'admin',
            'controller' => 'user',
            'action'     => 'info',
        )
    ),
    'admin-user-csv' => new Zend_Controller_Router_Route_Static(
        'admin/user/csv',
        array(
            'module'     => 'admin',
            'controller' => 'user',
            'action'     => 'csv',
            'format'     => 'json'
        )
    ),
    'admin-posse' => new Zend_Controller_Router_Route(
        'admin/group/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'posse',
            'action'     => 'list',
        )
    ),
    'admin-product' => new Zend_Controller_Router_Route(
        'admin/product/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'product',
            'action'     => 'list',
        )
    ),
    'admin-designer-product-toggle-visible' => new Zend_Controller_Router_Route(
        'admin/designer-product/toggle-visibile/:id',
        array(
            'module'     => 'admin',
            'controller' => 'designer-product',
            'action'     => 'toggle-visible',
            'format'     => 'json'
        ),
        array(
            'id' => '\d+'
        )
    ),
    'admin-category' => new Zend_Controller_Router_Route(
        'admin/category/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'category',
            'action'     => 'sort',
        )
    ),
    'admin-warehouse' => new Zend_Controller_Router_Route(
        'admin/warehouse/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'warehouse',
            'action'     => 'list',
        )
    ),
    'admin-desire' => new Zend_Controller_Router_Route(
        'admin/desire/:action/*',
        array(
            'module'        => 'admin',
            'controller'    => 'desire',
            'action'        => 'list',
        )
    ),
    'admin-shipping-tablerate' => new Zend_Controller_Router_Route(
        'admin/shipping-tablerate/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'shipping-tablerate',
            'action'     => 'list',
        )
    ),
    'admin-campaign' => new Zend_Controller_Router_Route(
        'admin/campaign/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'campaign',
            'action'     => 'list',
        )
    ),
    'admin-collections' => new Zend_Controller_Router_Route(
        'admin/collections/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'collections',
            'action'     => 'index'
        )
    ),
    'admin-collection-menu-item' => new Zend_Controller_Router_Route(
        'admin/collection-menu-item/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'collection-menu-item',
            'action'     => 'index'
        )
    ),
    'admin-collection' => new Zend_Controller_Router_Route(
        'admin/collection/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'collection',
            'action'     => 'list',
        )
    ),    
    'admin-collection-page' => new Zend_Controller_Router_Route(
        'admin/collection-page/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'collection-page',
            'action'     => 'list',
        )
    ),
    'admin-collection-page-view' => new Zend_Controller_Router_Route(
        'admin/collection-page/view/:id',
        array(
            'module'     => 'admin',
            'controller' => 'collection-page',
            'action'     => 'view',
            'format'     => 'html',
            'id'         => '',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-background-image' => new Zend_Controller_Router_Route(
        'admin/background-image/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'background-image',
            'action'     => 'view',
        )
    ),
    'admin-image' => new Zend_Controller_Router_Route(
        'admin/image/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'image',
            'action'     => 'list',
        )
    ),
    'admin-image-upload' => new Zend_Controller_Router_Route(
        'admin/image/upload/:profile/*',
        array(
            'module'     => 'admin',
            'controller' => 'image',
            'action'     => 'upload',
            'profile'    => 'image'
        )
    ),

    'admin-image-selector' => new Zend_Controller_Router_Route(
        'admin/image-selector/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'image-selector',
            'action'     => 'list'
        )
    ),
    'admin-image-selector-list' => new Zend_Controller_Router_Route(
        'admin/image-selector/list/*',
        array(
            'module'     => 'admin',
            'controller' => 'image-selector',
            'action'     => 'list',
            'format'     => 'html',
        )
    ),
    'admin-discount-code' => new Zend_Controller_Router_Route(
        'admin/discount-code/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'discount-code',
            'action'     => 'list',
        )
    ),
    'admin-place' => new Zend_Controller_Router_Route(
        'admin/place/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'place',
            'action'     => 'list',
        )
    ),
    'admin-place-product-version' => new Zend_Controller_Router_Route(
        'admin/place-product-version/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'place-product-version',
            'action'     => 'list',
        )
    ),
    'admin-place-product-version-position-item' => new Zend_Controller_Router_Route(
        'admin/place-product-version/position-item/:id',
        array(
            'module'     => 'admin',
            'controller' => 'place-product-version',
            'action'     => 'position-item',
            'format'     => 'html',
            'id'         => '',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-purchase' => new Zend_Controller_Router_Route(
        'admin/purchase/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'purchase',
            'action'     => 'list',
        )
    ),
    'admin-purchase-filter' => new Zend_Controller_Router_Route_Static(
        'admin/purchase/filter',
        array(
            'module'     => 'admin',
            'controller' => 'purchase',
            'action'     => 'filter',
            'format'     => 'json'
        )
    ),
    'admin-purchase-item' => new Zend_Controller_Router_Route(
        'admin/purchase-item/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'purchase-item',
            'action'     => 'list',
        )
    ),
    'admin-tracking-code' => new Zend_Controller_Router_Route(
        'admin/tracking-code/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'tracking-code',
            'action'     => 'list',
        )
    ),
    'admin-designlover-story' => new Zend_Controller_Router_Route(
        'admin/designlover-story/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'designlover-story',
            'action'     => 'list',
        )
    ),
    'admin-gift-card' => new Zend_Controller_Router_Route(
        'admin/gift-card/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'gift-card',
            'action'     => 'add',
        )
    ),
    'admin-report' => new Zend_Controller_Router_Route_Static(
        'admin/report',
        array(
            'module'     => 'admin',
            'controller' => 'report',
            'action'     => 'select',
        )
    ),
    'admin-report-csv' => new Zend_Controller_Router_Route_Static(
        'admin/report/csv',
        array(
            'module'     => 'admin',
            'controller' => 'report',
            'action'     => 'csv',
            'format'     => 'json',
        )
    ),
    'admin-report-get-csv' => new Zend_Controller_Router_Route_Static(
        'admin/report/get-csv',
        array(
            'module'     => 'admin',
            'controller' => 'report',
            'action'     => 'get-csv',
        )
    ),
    'admin-transporter' => new Zend_Controller_Router_Route(
        'admin/transporter/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'transporter',
            'action'     => 'list',
        )
    ),
    'admin-business-model-view' => new Zend_Controller_Router_Route(
        'admin/business-model/view/*',
        array(
            'module'     => 'admin',
            'controller' => 'business-model',
            'action'     => 'view',
            'format'     => 'html',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-designer-image' => new Zend_Controller_Router_Route(
        'admin/designer-image/:action/*',
        array(
            'module'     => 'admin',
            'controller' => 'designer-image',
            'action'     => 'list',
            'format'     => 'json',
        )
    ),

    'admin-designer-image-view' => new Zend_Controller_Router_Route(
        'admin/designer-image/:id',
        array(
            'module'     => 'admin',
            'controller' => 'designer-image',
            'action'     => 'view',
            'format'     => 'html',
            'id'         => '',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-crud-list-item' => new Zend_Controller_Router_Route(
        'admin/:controller/list-item/:id',
        array(
            'module' => 'admin',
            'action' => 'list-item',
            'format' => 'html',
            'id'     => '',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-crud-set-order' => new Zend_Controller_Router_Route(
        'admin/:controller/set-order/*',
        array(
            'module' => 'admin',
            'action' => 'set-order',
            'format' => 'json',
        )
    ),
    'admin-crud-ajax-list' => new Zend_Controller_Router_Route(
        'admin/:controller/ajax-list/:page/:items_per_page/:sort/:order',
        array(
            'module'         => 'admin',
            'action'         => 'ajax-list',
            'format'         => 'html',
        ),
        array(
            'page'           => '\d+',
            'items_per_page' => '\d+',
            'sort'           => '[a-z-]+',
            'order'          => 'asc|desc',
        )
    ),
    'admin-crud-ajax-add' => new Zend_Controller_Router_Route(
        'admin/:controller/ajax-add/*',
        array(
            'module' => 'admin',
            'action' => 'add',
            'format' => 'html',
        )
    ),
    'admin-crud-ajax-edit' => new Zend_Controller_Router_Route(
        'admin/:controller/ajax-edit/:id',
        array(
            'module' => 'admin',
            'action' => 'edit',
            'format' => 'html',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-crud-ajax-copy' => new Zend_Controller_Router_Route(
        'admin/:controller/copy/:id',
        array(
            'module' => 'admin',
            'action' => 'copy',
            'format' => 'html',
        ),
        array(
            'id' => '\d+',
        )
    ),
    'admin-crud-save' => new Zend_Controller_Router_Route(
        'admin/:controller/save/*',
        array(
            'module' => 'admin',
            'action' => 'save',
            'format' => 'json',
        )
    ),
    'admin-crud-save-batch' => new Zend_Controller_Router_Route(
        'admin/:controller/save-batch/*',
        array(
            'module' => 'admin',
            'action' => 'save-batch',
            'format' => 'json',
        )
    ),
    'admin-crud-delete' => new Zend_Controller_Router_Route(
        'admin/:controller/delete/*',
        array(
            'module' => 'admin',
            'action' => 'delete',
            'format' => 'json',
        )
    ),
    'admin-product-version-list' => new Zend_Controller_Router_Route(
        'admin/product-version-list/:id',
        array(
            'module'     => 'admin',
            'controller' => 'product-version',
            'action'     => 'list',
            'format'     => 'html',
            'id'         => '',
        ),
        array(
            'id' => '\d+',
        )
    ),

    
    // Ds
    'home' => new Zend_Controller_Router_Route_Static(
        '',
        array(
            'module'     => 'ds',
            'controller' => 'index',
            'action'     => 'index',
        )
    ),
    'about' => new Zend_Controller_Router_Route_Static(
        'company/about',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'about',
        )
    ),
    'getting-started' => new Zend_Controller_Router_Route_Static(
        'getting-started',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'getting-started',
        )
    ),
    'terms-of-use' => new Zend_Controller_Router_Route_Static(
        'company/termsofuse',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'terms-of-use',
        )
    ),
    'privacy-policy' => new Zend_Controller_Router_Route_Static(
        'company/privacy',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'privacy-policy',
        )
    ),
    'faq' => new Zend_Controller_Router_Route_Static(
        'company/faq',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'faq',
        )
    ),
    'shipping-and-returns' => new Zend_Controller_Router_Route_Static(
        'company/shipping-and-returns',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'shipping',
        )
    ),
    'press' => new Zend_Controller_Router_Route_Static(
        'company/press',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'view'      => 'contact',
            'action'     => 'press',
            'subject'    => 'press',
        )
    ),
    'contact-us' => new Zend_Controller_Router_Route_Static(
        'company/contact-us',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'contact',
            'subject'    => 'contact-us'
        )
    ),
    'contact-submit' => new Zend_Controller_Router_Route_Static(
        'company/contact-submit',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'contact-submit',
            'format'     => 'json'
        )
    ),
    'contact-thankyou' => new Zend_Controller_Router_Route_Static(
        'contact/thank-you',
        array(
            'module'        => 'ds',
            'controller'    => 'info',
            'action'        => 'thank-you',
        )
    ),
    'for-designers' => new Zend_Controller_Router_Route_Static(
        'company/for-designers',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'for-designers',
            'subject'    => 'for-designers'
        )
    ),
    'for-designers-submit' => new Zend_Controller_Router_Route_Static(
        'company/for-designers/send',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'for-designers-submit',
            'format'     => 'json'
        )
    ),
    'for-designers-thank-you' => new Zend_Controller_Router_Route_Static(
        'company/for-designers/thank-you',
        array(
            'module'        => 'ds',
            'controller'    => 'info',
            'action'        => 'for-designers-thank-you',
        )
    ),
    'unsubscribe' => new Zend_Controller_Router_Route_Static(
        'unsubscribe',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'unsubscribe',
        )
    ),
    'jobs' => new Zend_Controller_Router_Route_Static(
        'jobs',
        array(
            'module'     => 'ds',
            'controller' => 'info',
            'action'     => 'jobs',
        )
    ),
    'login' => new Zend_Controller_Router_Route_Static(
        'login',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'login',
            'format'     => 'json',
        )
    ),
    'logout' => new Zend_Controller_Router_Route(
        'logout',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'logout',
        )
    ),
    'pre-logout' => new Zend_Controller_Router_Route(
        'pre-logout',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'pre-logout',
            'format'     => 'json',
        )
    ),
    'login-dialog' => new Zend_Controller_Router_Route_Static(
        'login-dialog',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'login-dialog',
            'format'     => 'html'
        )
    ),
    'facebook' => new Zend_Controller_Router_Route_Static(
        'facebook',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'facebook',
            'format'     => 'json'
        )
    ),
    'email-exists' => new Zend_Controller_Router_Route_Static(
        'email-exists',
        array(
            'module'     => 'ds',
            'controller' => 'auth',
            'action'     => 'email-exists',
            'format'     => 'json'
        )
    ),
    'mail-chimp-webhook' => new Zend_Controller_Router_Route_Static(
        'db5d9d615c937360d0b73cb2afdc1d2db2bdda47',
        array(
            'module'     => 'ds',
            'controller' => 'webhook',
            'action'     => 'mail-chimp',
        )
    ),


    'invite' => new Zend_Controller_Router_Route(
        'invite/:tag',
        array(
            'module'     => 'ds',
            'controller' => 'invitation',
            'action'     => 'by-tag'
        )
    ),
    'invite-hash' => new Zend_Controller_Router_Route(
        'invite/:tag/:hash',
        array(
            'module'     => 'ds',
            'controller' => 'invitation',
            'action'     => 'by-tag',
        )
    ),
    'invite-friends' => new Zend_Controller_Router_Route_Static(
        'invite-friends',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'invitation',
        )
    ),
    'invite-friends-address-book' => new Zend_Controller_Router_Route_Static(
        'invite-friends/address-book', // for Plaxo
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'invitation-address-book',
        )
    ),
    'invite-friends-reminder' => new Zend_Controller_Router_Route_Static(
        'profile/save-invite-friends-reminder',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'save-invite-friends-reminder',
            'format'     => 'json'
        )
    ),

    'register' => new Zend_Controller_Router_Route_Static(
        'register',
        array(
            'module'        => 'ds',
            'controller'    => 'registration',
            'action'        => 'page'
        )
    ),
    /* for remodelista */
    'register-tag' => new Zend_Controller_Router_Route(
        'register/:tag',
        array(
            'module'     => 'ds',
            'controller' => 'invitation',
            'action'     => 'by-tag'
        )
    ),
    'register-save-registration' => new Zend_Controller_Router_Route_Static(
        'register/save',
        array(
            'module'        => 'ds',
            'controller'    => 'registration',
            'action'        => 'save',
            'format'        => 'json'
        )
    ),
    'register-save-facebook' => new Zend_Controller_Router_Route_Static(
        'register/save-facebook',
        array(
            'module'     => 'ds',
            'controller' => 'registration',
            'action'     => 'save-facebook',
            'format'     => 'json'
        )
    ),
    'invite-send-friend-invitation' => new Zend_Controller_Router_Route_Static(
        'invite-friends/send',
        array(
            'module'        => 'ds',
            'controller'    => 'invitation',
            'action'        => 'save-email-invitation',
            'format'        => 'json'
        )
    ),

    //wishlist
    'wishlist' => new Zend_Controller_Router_Route_Static(
        'wishlist',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'index',
        )
    ),
    'wishlist-view' => new Zend_Controller_Router_Route(
        'wishlist/:wishlist_link',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'view',
        ),
        array(
            'wishlist_link' => '[a-f0-9]{40}'
        )
    ),
    'wishlist-view-partial' => new Zend_Controller_Router_Route(
        'wishlist/partial/:partial_wishlist_link',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'view-partial',
        ),
        array(
            'partial_wishlist_link' => '[a-f0-9]{40}'
        )
    ),
    'wishlist-share-selected' => new Zend_Controller_Router_Route(
        'wishlist/share',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'share-selected',
            'format'     => 'json'
        )
    ),
    'wishlist-delete-selected' => new Zend_Controller_Router_Route(
        'wishlist/delete-selected',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'delete-selected'
        )
    ),
    'wishlist-set-page' => new Zend_Controller_Router_Route(
        'wishlist/set-page/:page/:wishlist_link',
        array(
            'module'        => 'content',
            'controller'    => 'wishlist',
            'action'        => 'set-page',
            'wishlist_link' => '',
        ),
        array(
            'page'          => '\d+',
            'wishlist_link' => '[a-f0-9]{40}',
        )
    ),
    'wishlist-set-sort' => new Zend_Controller_Router_Route(
        'wishlist/set-sort/:wishlist_link',
        array(
            'module'        => 'content',
            'controller'    => 'wishlist',
            'action'        => 'set-sort',
            'wishlist_link' => '',
        ),
        array(
            'wishlist_link' => '[a-f0-9]{40}',
        )
    ),
    'wishlist-set-perpage' => new Zend_Controller_Router_Route(
        'wishlist/set-perpage/:value/:wishlist_link',
        array(
            'module'        => 'content',
            'controller'    => 'wishlist',
            'action'        => 'set-perpage',
            'wishlist_link' => '',
        ),
        array(
            'value'         => '\d+',
            'wishlist_link' => '[a-f0-9]{40}',
        )
    ),
    'wishlist-update-settings' => new Zend_Controller_Router_Route(
        'wishlist/update-settings',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'update-settings',
            'format'     => 'json'
        )
    ),
    'wishlist-edit' => new Zend_Controller_Router_Route(
        'desire/:desire_id/edit',
        array(
            'module'     => 'content',
            'controller' => 'desire',
            'action'     => 'edit',
            'format'     => 'html',
        ),
        array(
            'desire_id' => '\d+',
        )
    ),
    'wishlist-update' => new Zend_Controller_Router_Route(
        'desire/:desire_id/update',
        array(
            'module'     => 'content',
            'controller' => 'desire',
            'action'     => 'update',
            'format'     => 'json'
        ),
        array(
            'desire_id' => '\d+',
        )
    ),
    'wishlist-refresh' => new Zend_Controller_Router_Route(
        'wishlist/refresh',
        array(
            'module'     => 'content',
            'controller' => 'wishlist',
            'action'     => 'refresh',
        )
    ),
    'wishlist-delete' => new Zend_Controller_Router_Route(
        'desire/:desire_id/delete',
        array(
            'module'     => 'content',
            'controller' => 'desire',
            'action'     => 'delete',
            'format'     => 'json'
        ),
        array(
            'desire_id' => '\d+',
        )
    ),
    'wishlist-add' => new Zend_Controller_Router_Route(
        'desire/:type/:id/add',
        array(
            'module'     => 'content',
            'controller' => 'desire',
            'action'     => 'add',
            'format'     => 'json'
        )
    ),
    'waitlist-add' => new Zend_Controller_Router_Route(
        'waitlist/:desire_id/add',
        array(
            'module'     => 'content',
            'controller' => 'desire',
            'action'     => 'add-to-waitlist',
            'format'     => 'json'
        )
    ),
    'show-item' => new Zend_Controller_Router_Route(
        'show-item/:type/:key',
        array(
            'module'     => 'ds',
            'controller' => 'share',
            'action'     => 'redirect'
        )
    ),
    'share-by-email' => new Zend_Controller_Router_Route(
        'share/:type/:key',
        array(
            'module'     => 'ds',
            'controller' => 'share',
            'action'     => 'share-by-email',
            'format'     => 'html'
        )
    ),
    'send-share-email' => new Zend_Controller_Router_Route(
        'share/send',
        array(
            'module'     => 'ds',
            'controller' => 'share',
            'action'     => 'send-share-email',
            'format'     => 'json'
        )
    ),

    // Redirect
    'redirect-login-to-continue' => new Zend_Controller_Router_Route_Static(
        'login-to-continue',
        array(
            'module'     => 'ds',
            'controller' => 'redirect',
            'action'     => 'login-to-continue',
        )
    ),
    'redirect-campaigns' => new Zend_Controller_Router_Route_Static(
        'campaigns',
        array(
            'module'     => 'ds',
            'controller' => 'redirect',
            'action'     => 'campaigns',
        )
    ),
    // Content
       
    'campaign-slug' => new Zend_Controller_Router_Route(
        'campaign/:slug',
        array(
            'module'     => 'content',
            'controller' => 'campaign',
            'action'     => 'view',
        )
    ),
    /* FIXME: Temporarily hiding this
    'collections' => new Zend_Controller_Router_Route(
        'collections',
        array(
            'module'     => 'content',
            'controller' => 'product-collection',
            'action'     => 'index'
        )
    ),
    */
    'collection-slug' => new Zend_Controller_Router_Route(
        'collection/:slug',
        array(
            'module'     => 'content',
            'controller' => 'product-collection',
            'action'     => 'view'
        )
    ),
    'campaign-id' => new Zend_Controller_Router_Route(
        'campaign/:campaign_id',
        array(
            'module'     => 'content',
            'controller' => 'campaign',
            'action'     => 'view-by-id',
        ),
        array(
            'campaign_id' => '\d+',
        )
    ),
    'campaign-teaser' => new Zend_Controller_Router_Route(
        'campaign/:slug/teaser',
        array(
            'module'     => 'content',
            'controller' => 'campaign',
            'action'     => 'teaser',
            'format'     => 'html',
        )
    ),
    'collection-product-version' => new Zend_Controller_Router_Route(
        'product/:collection_slug/:product_version_slug',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'collection-product',
        )
    ),
    
    'campaign-product-version-slug' => new Zend_Controller_Router_Route(
        'campaign-product/:slug',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'product-version-by-slug',
        )
    ),
    'campaign-product-version-by-id' => new Zend_Controller_Router_Route(
        'campaign-product/:product_version_id',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'product-version',
        ),
        array(
            'product_version_id' => '\d+',
        )
    ),
    'calendar' => new Zend_Controller_Router_Route(
        'calendar',
        array(
            'module'     => 'content',
            'controller' => 'calendar',
            'action'     => 'index',
        )
    ),

    'product-version' => new Zend_Controller_Router_Route(
        'product-version/:product_version_id',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'product-version',
        ),
        array(
            'product_version_id' => '\d+',
        )
    ),
    'collection-product-version-quickview' => new Zend_Controller_Router_Route(
        'product/:collection_slug/:product_version_slug/quickview',
        array(
            'module'          => 'content',
            'controller'      => 'product',
            'action'          => 'quickview',
            'format'          => 'html',
            'collection_slug' => '',
        )
    ),
    'campaign-product-version-details' => new Zend_Controller_Router_Route(
        'product/:collection_id/:product_version_id/details',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'details',
            'format'     => 'html',
        ),
        array(
            'collection_id'      => '\d+',
            'product_version_id' => '\d+',
        )
    ),
    'collection-product-version-view-larger' => new Zend_Controller_Router_Route(
        'product/:slug/view-larger',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'view-larger',
            'format'     => 'html',
        )
    ),
    'collection-product-version-view-larger-id' => new Zend_Controller_Router_Route(
        'product/:product_version_id/view-larger',
        array(
            'module'     => 'content',
            'controller' => 'product',
            'action'     => 'view-larger-by-id',
            'format'     => 'html',
        ),
        array(
            'product_version_id' => '\d+',
        )
    ),

    'design-studios' => new Zend_Controller_Router_Route(
        'design-studios/:design_studio_collection_id',
        array(
            'module'     => 'content',
            'controller' => 'design-studio-collection',
            'action'     => 'select',
            'design_studio_collection_id' => '0',
        ),
        array(
            'design_studio_collection_id' => '\d+'
        )
    ),
    
    'design-studio-select-change' => new Zend_Controller_Router_Route(
        'design-studios/change/:design_studio_collection_id',
        array(
            'module'     => 'content',
            'controller' => 'design-studio-collection',
            'action'     => 'change',
            'format'     => 'html',
            'design_studio_collection_id' => '',
        ),
        array(
            'design_studio_collection_id' => '\d+'
        )
    ),

    'design-studio-designer-slug' => new Zend_Controller_Router_Route(
        'design-studio/:slug',
        array(
            'module'     => 'content',
            'controller' => 'designer',
            'action'     => 'design-studio',
        )
    ),
    'design-studio-designer-id' => new Zend_Controller_Router_Route(
        'design-studio/:designer_id',
        array(
            'module'     => 'content',
            'controller' => 'designer',
            'action'     => 'design-studio-by-id',
        ),
        array(
            'designer_id' => '\d+'
        )
    ),
    /*
    // @todo Commented out until collections are implemented
    'ds-now-change' => new Zend_Controller_Router_Route(
        'ds-now/change/:section',
        array(
            'module'     => 'content',
            'controller' => 'ds-now',
            'action'     => 'change',
            'format'     => 'html',
            'section'    => '',
        ),
        array(
            'section' => 'on-sale|studios',
        )
    ),
    */
    'ds-now-on-sale' => new Zend_Controller_Router_Route_Static(
        'ds-now/on-sale',
        array(
            'module'     => 'content',
            'controller' => 'ds-now',
            'action'     => 'on-sale',
        )
    ),
    'profile' => new Zend_Controller_Router_Route_Static(
        'profile',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile',
        )
    ),
    'profile-save-basic' => new Zend_Controller_Router_Route_Static(
        'profile/save-account-information',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile-save-basic',
            'format'     => 'json'
        )
    ),
    'profile-save-credentials' => new Zend_Controller_Router_Route_Static(
        'profile/save-credentials',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile-save-credentials',
            'format'     => 'json'
        )
    ),
    'profile-save-notifications' => new Zend_Controller_Router_Route_Static(
        'profile/save-notifications',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile-save-notifications',
            'format'     => 'json'
        )
    ),
    'profile-save-shipping' => new Zend_Controller_Router_Route_Static(
        'profile/save-shipping-address',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile-save-shipping',
            'format'     => 'json'
        )
    ),
    'profile-save-billing' => new Zend_Controller_Router_Route_Static(
        'profile/save-billing',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'profile-save-billing',
            'format'     => 'json'
        )
    ),
    'orders' => new Zend_Controller_Router_Route_Static(
        'profile/orders',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'orders'
        )
    ),
    'order' => new Zend_Controller_Router_Route(
        'profile/order/:purchase_id',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'order',
        ),
        array(
            'purchase_id' => '\d+'
        )
    ),
    'invitations' => new Zend_Controller_Router_Route_Static(
        'profile/invitations',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'invitation'
        )
    ),
    'credits' => new Zend_Controller_Router_Route_Static(
        'profile/credits',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'credit'
        )
    ),
    'notifications' => new Zend_Controller_Router_Route_Static(
        'profile/email-preferences',
        array(
            'module'     => 'ds',
            'controller' => 'user',
            'action'     => 'notification'
        )
    ),
    'cart-popup' => new Zend_Controller_Router_Route_Static(
        'cart/popup',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'cart-popup',
            'format'     => 'html'
        )
    ),
    'cart' => new Zend_Controller_Router_Route_Static(
        'cart',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'index'
        )
    ),

    'cart-refresh' => new Zend_Controller_Router_Route_Static(
        'cart/refresh',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'refresh',
            'format'     => 'json'
        )
    ),

    'cart-open-edit' => new Zend_Controller_Router_Route(
        'cart/:product_id/open-edit',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'index'
        ),
        array(
            'product_id' => '\d+'
        )
    ),
    'cart-save' => new Zend_Controller_Router_Route_Static(
        'cart/save',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'index-save',
            'format'     => 'json'
        )
    ),
    'cart-submit-and-refresh' => new Zend_Controller_Router_Route_Static(
        'cart/submit-and-refresh',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'index-save',
            'refresh'    =>  'true',
            'format'     => 'json'
        )
    ),
    'cart-edit' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/edit',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'edit-product-version',
            'format'     => 'html',
        ),
        array(
            'product_version_id' => '\d+'
        )
    ),
    'cart-update' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/update',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'update-product-version',
            'format'     => 'json',
        ),
        array(
            'product_version_id' => '\d+'
        )
    ),
    'cart-delete' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/delete',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'delete-product-version',
            'format'     => 'json',
        ),
        array(
            'product_version_id' => '\d+'
        )
    ),
    'cart-delete-from-popup' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/delete-from-popup',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'delete-from-popup',
            'format'     => 'json'
        ),
        array(
            'product_version_id' => '\d+'
        )
    ),
    'cart-add' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/:collection_id/add',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'add-product-version',
            'format'     => 'json',
        ),
        array(
            'product_version_id' => '\d+',
            'collection_id'      => '\d+'
        )
    ),
    'cart-add-from-outside' => new Zend_Controller_Router_Route(
        'cart/:product_version_id/add-from-outside',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'add-product-version-from-outside',
            'format'     => 'html',
        ),
        array(
            'product_version_id' => '\d+'
        )
    ),
    'cart-expiration-time-left' => new Zend_Controller_Router_Route_Static(
        'cart/time',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'expiration-time-left',
            'format'     => 'json'
        )
    ),
    'cart-move-to-wishlist' => new Zend_Controller_Router_Route(
        'cart/:type/:id/move-to-wishlist',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'move-to-wishlist',
            'format'     => 'json'
        )
    ),
    'cart-expired' => new Zend_Controller_Router_Route(
        'cart/expired',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'expired',
        )
    ),

    'cart-empty' => new Zend_Controller_Router_Route(
        'cart/empty',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'empty',
        )
    ),
    
    'cart-sign-in' => new Zend_Controller_Router_Route(
        'cart/sign-in',
        array(
            'module'     => 'order',
            'controller' => 'cart',
            'action'     => 'signIn',
        )
    ),   

    'checkout-shipping' => new Zend_Controller_Router_Route_Static(
        'checkout/shipping',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'shipping',
        )
    ),
    'checkout-shipping-save' => new Zend_Controller_Router_Route_Static(
        'checkout/shipping/save',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'shipping-save',
            'format'     => 'json'
        )
    ),
    'checkout-billing' => new Zend_Controller_Router_Route_Static(
        'checkout/billing',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'billing',
        )
    ),
    'checkout-billing-save' => new Zend_Controller_Router_Route_Static(
        'checkout/billing/save',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'billing-save',
            'format'     => 'json'
        )
    ),
    'checkout-confirm' => new Zend_Controller_Router_Route_Static(
        'checkout/confirm',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'confirm',
        )
    ),
    'checkout-confirm-save' => new Zend_Controller_Router_Route_Static(
        'checkout/confirm/save',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'confirm-save',
            'format'     => 'json'
        )
    ),
    'checkout-confirm-accepted' => new Zend_Controller_Router_Route(
        'order-confirmation/:purchase_id',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'confirm-accepted',
            'format'     => 'html'
        )
    ),
    'view-email' => new Zend_Controller_Router_Route(
        'view-email/:email_hash',
        array(
            'module'     => 'order',
            'controller' => 'checkout',
            'action'     => 'view-email',
            'format'     => 'html'
        )
    ),
    'reset-password-request' => new Zend_Controller_Router_Route_Static(
        'reset-password',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'request',
        )
    ),
    'reset-password-link' => new Zend_Controller_Router_Route_Static(
        'reset-password/send',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'send-link',
            'format'     => 'json'
        )
    ),
    'reset-password-form' => new Zend_Controller_Router_Route(
        'reset-password/:user_id/:hash',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'reset-form',
            'format'     => 'html'
        ),
        array(
            'user_id'    => '\d+',
            'hash'       => '[a-z0-9]{40}'
        )
    ),
    'reset-password' => new Zend_Controller_Router_Route(
        'reset-password/:user_id/:hash/send',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'reset',
            'format'     => 'json'
        ),
        array(
            'user_id'    => '\d+',
            'hash'       => '[a-z0-9]{40}'
        )
    ),
    'reset-password-auth-fail' => new Zend_Controller_Router_Route_Static(
        'reset-password/fail',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'auth-fail',
            'format'     => 'html'
        )
    ),
    'reset-password-changed' => new Zend_Controller_Router_Route_Static(
        'reset-password/changed',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'changed',
            'format'     => 'html'
        )
    ),
    'reset-password-link-sent' => new Zend_Controller_Router_Route_Static(
        'reset-password/sent',
        array(
            'module'     => 'ds',
            'controller' => 'password-recovery',
            'action'     => 'link-sent',
        )
    ),


    // Promo
    'promo-soap-chair' => new Zend_Controller_Router_Route_Static(
        'promo/soapchair',
        array(
            'module'     => 'promo',
            'controller' => 'soap-chair',
            'action'     => 'index',
        )
    ),
    'promo-soap-chair-thank-you' => new Zend_Controller_Router_Route_Static(
        'promo/soapchair/thank-you',
        array(
            'module'     => 'promo',
            'controller' => 'soap-chair',
            'action'     => 'thank-you',
        )
    ),
    /*
    'promo-bike' => new Zend_Controller_Router_Route_Static(
        'promo/public_m3',
        array(
            'module'     => 'promo',
            'controller' => 'bike',
            'action'     => 'index',
        )
    ),
    'promo-bike-thank-you' => new Zend_Controller_Router_Route_Static(
        'promo/public_m3/thank-you',
        array(
            'module'     => 'promo',
            'controller' => 'bike',
            'action'     => 'thank-you',
        )
    ),
    'promo-bike-save' => new Zend_Controller_Router_Route_Static(
        'promo/public_m3/save',
        array(
            'module'     => 'promo',
            'controller' => 'bike',
            'action'     => 'save',
            'format'     => 'json',
        )
    ),
    */
);
