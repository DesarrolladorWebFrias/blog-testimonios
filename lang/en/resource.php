<?php
return[
      //common lang keys
    'created_at' => "Created At",
    'updated_at' => "Updated At",
     // notifications.
    'notification' => [
        'success' => [
            'default_title' => "Sucess",
            'default_body' => "Action Completed Successfully."
        ]
    ],

    //category la navegacion que puede ser una matriz 
    //luego campos que seran una matriz
    //primero sera la etiqueta digamos cual sera la categoria
   // category
    'category' => [
        'navigation' => [
            'label' => "Category",  
            'model_label' => "Category",
            'plural_model_label' => "Category"
        ],
        'fields' => [
            'name' => "Name",
            'slug' => "Slug",
            'parent_category' => "Parent",
            'description' => "Description",
            "status" => "Status"
        ],
        'action' => [
            'toggle' => "Toggle"
        
        ]
    ]
    ]; 


