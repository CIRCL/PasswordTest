<?php
	/*******************************************************************************
        Copyright 2011 CASES Luxembourg (www.cases.lu)
        Copyright 2011 SMILE GIE

           Licensed under the Apache License, Version 2.0 (the "License");
           you may not use this file except in compliance with the License.
           You may obtain a copy of the License at

               http://www.apache.org/licenses/LICENSE-2.0
        
           Unless required by applicable law or agreed to in writing, software
           distributed under the License is distributed on an "AS IS" BASIS,
           WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
           See the License for the specific language governing permissions and
           limitations under the License.

        CASES and BEE SECURE are registered trademarks of SMILE GIE, all rights reserved
        ********************************************************************************/

	class translations
	{
		private $currentLang;
		private $trans;
		private static $instance;

		public function __construct($language='fr')
		{
			switch($language)
			{
				case "de":
					include_once "de.php";
					$currentLang="de";
					break;
				case "en":
					include_once "en.php";
					$currentLang="en";
					break;
				default:
					include_once "fr.php";
					$currentLang="fr";
					break;
			}
			$this->trans=$trans;	
			$this->currentLang=$currentLang;
		}

		public function getLanguage()
		{
			return $this->currentLang;
		}

		public function translate($original)
		{
			if (array_key_exists($original,$this->trans))
			{
				return $this->trans[$original];
			}
			return "### $original ###";
		}

		public function __invoke($original)
		{
			return $this->translate($original);
		}
		
		public static function getInstance($language='fr')
		{
			if (! self::$instance instanceof self)
			{
				self::$instance=new self($language);
			}
			return self::$instance;
		}
	}

	if (isset($_REQUEST['lang']))
        {
                $translate=translations::getInstance($_REQUEST['lang']);
        }
        else
        {
		$translate=translations::getInstance();
        }
