<?php
return[
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
        /*'action' => [
            'toggle' => "Toggle"
        ],
        'notification' => [
            'toggle_status' => [
                'success' => [
                    'title' => 'Category status updated',
                    'body'  => 'The selected categories have been updated successfully.',
                ],
                'error' => [
                    'title' => 'Update failed',
                    'body'  => 'Unable to update category statuses. Please try again.',
                ],
            ],
        ],*/
    ]
    ]; 


