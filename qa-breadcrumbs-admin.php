<?php

/*
  Question2Answer (c) Gideon Greenspan
  Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)
*/

	class q2a_breadcrumbs_admin {
    /*added the options as constants to avoid multiple occurances */
	const SHOW_HOME       = 'ami_breadcrumb_show_home' ;
	const TRUNCATE_LENGTH = 'ami_breadcrumb_trunc_len' ;
	const NO_LINK_AT_LAST_ELEM = 'ami_breadcrumb_no_link_last_elem' ;
	const DONT_USE_ICONS = 'ami_breadcrumb_dont_use_icons' ;
	const CUSTOM_CSS      = 'ami_breadcrumb_custom_css' ;
	const SAVE_BUTTON     = 'ami_breadcrumb_save_btn' ;

		function allow_template($template)
		{
			return ($template!='admin');
		}
				
		function admin_form(&$qa_content)
		{
			$saved=false;
			
			if (qa_clicked(self::SAVE_BUTTON)) {	
              qa_opt(self::SHOW_HOME ,       !!qa_post_text(self::SHOW_HOME));
              qa_opt(self::NO_LINK_AT_LAST_ELEM ,       !!qa_post_text(self::NO_LINK_AT_LAST_ELEM));
              qa_opt(self::DONT_USE_ICONS ,       !!qa_post_text(self::DONT_USE_ICONS));
              qa_opt(self::TRUNCATE_LENGTH ,  qa_post_text(self::TRUNCATE_LENGTH));
              qa_opt(self::CUSTOM_CSS ,  qa_post_text(self::CUSTOM_CSS));
        			$saved=true;
			}
			
			return array(
				'ok' => $saved ? qa_lang('breadcrumbs/settings_saved') : null,
				
				'fields' => array(
                    self::SHOW_HOME => array(
                              'label' => 'Show the home link ',
                              'type'  => 'checkbox',
                              'tags'  => 'name="'.self::SHOW_HOME.'"',
                              'value' => qa_opt(self::SHOW_HOME),
                    ),
                    self::TRUNCATE_LENGTH => array(
                              'label' => qa_lang('breadcrumbs/opt_truncate'),
                              'type'  => 'text',
                              'tags'  => 'name="'.self::TRUNCATE_LENGTH.'"',
                              'value' => qa_opt(self::TRUNCATE_LENGTH),
                    ),
                    self::NO_LINK_AT_LAST_ELEM => array(
                              'label' => qa_lang('breadcrumbs/dont_use_link_for_last_elem'),
                              'type'  => 'checkbox',
                              'tags'  => 'name="'.self::NO_LINK_AT_LAST_ELEM.'"',
                              'value' => qa_opt(self::NO_LINK_AT_LAST_ELEM),
                    ),
                    self::DONT_USE_ICONS => array(
                              'label' => qa_lang('breadcrumbs/dont_use_icons'),
                              'type'  => 'checkbox',
                              'tags'  => 'name="'.self::DONT_USE_ICONS.'"',
                              'value' => qa_opt(self::DONT_USE_ICONS),
                    ),

                    self::CUSTOM_CSS => array(
                              'label' => qa_lang('breadcrumbs/custom_css'),
                              'type'  => 'textarea',
                              'rows' => 10 ,
                              'tags'  => 'name="'.self::CUSTOM_CSS.'"',
                              'value' => qa_opt(self::CUSTOM_CSS),
                    ),

        ),
				
				'buttons' => array(
      					array(
      						'label' => qa_lang('breadcrumbs/save_changes'),
      						'tags' => 'name="'.self::SAVE_BUTTON.'"',
      					),
				 ),
			);
		}
    function option_default($option) {

	      switch($option) {
	          case self::SHOW_HOME:
	            return 1;
	          case self::TRUNCATE_LENGTH:
	            return 50 ;
	          case self::NO_LINK_AT_LAST_ELEM:
	            return 1 ;
	          case self::DONT_USE_ICONS:
	            return 0 ;
	          default : 
	            return null;  
	      }
      
    }

}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
