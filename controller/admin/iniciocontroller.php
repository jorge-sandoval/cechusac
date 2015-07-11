<?php
	class InicioController extends Controller
	{
		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();
		}

		public function Index()
		{
			$this->LoadView();
		}
	}