<?php

    class Customer_controller
    {
        private $model;

        function __construct($model)
        {
            $this->model = $model;
        }

        function start()
        {
            $this->model->updateView();
        }
    }