<?php
//
class form_products_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $productid;
   var $shippingid;
   var $measure;
   var $measure_1;
   var $categoryid;
   var $subcategoryid;
   var $name;
   var $description;
   var $picture;
   var $picture_scfile_name;
   var $picture_ul_name;
   var $picture_scfile_type;
   var $picture_ul_type;
   var $picture_limpa;
   var $picture_salva;
   var $out_picture;
   var $out1_picture;
   var $price;
   var $taxable;
   var $onhandquantity;
   var $prod_active;
   var $overview;
   var $specifications;
   var $acessories;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['acessories']))
          {
              $this->acessories = $this->NM_ajax_info['param']['acessories'];
          }
          if (isset($this->NM_ajax_info['param']['categoryid']))
          {
              $this->categoryid = $this->NM_ajax_info['param']['categoryid'];
          }
          if (isset($this->NM_ajax_info['param']['description']))
          {
              $this->description = $this->NM_ajax_info['param']['description'];
          }
          if (isset($this->NM_ajax_info['param']['measure']))
          {
              $this->measure = $this->NM_ajax_info['param']['measure'];
          }
          if (isset($this->NM_ajax_info['param']['name']))
          {
              $this->name = $this->NM_ajax_info['param']['name'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['onhandquantity']))
          {
              $this->onhandquantity = $this->NM_ajax_info['param']['onhandquantity'];
          }
          if (isset($this->NM_ajax_info['param']['overview']))
          {
              $this->overview = $this->NM_ajax_info['param']['overview'];
          }
          if (isset($this->NM_ajax_info['param']['picture']))
          {
              $this->picture = $this->NM_ajax_info['param']['picture'];
          }
          if (isset($this->NM_ajax_info['param']['picture_limpa']))
          {
              $this->picture_limpa = $this->NM_ajax_info['param']['picture_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['picture_ul_name']))
          {
              $this->picture_ul_name = $this->NM_ajax_info['param']['picture_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['picture_ul_type']))
          {
              $this->picture_ul_type = $this->NM_ajax_info['param']['picture_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['price']))
          {
              $this->price = $this->NM_ajax_info['param']['price'];
          }
          if (isset($this->NM_ajax_info['param']['prod_active']))
          {
              $this->prod_active = $this->NM_ajax_info['param']['prod_active'];
          }
          if (isset($this->NM_ajax_info['param']['productid']))
          {
              $this->productid = $this->NM_ajax_info['param']['productid'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['shippingid']))
          {
              $this->shippingid = $this->NM_ajax_info['param']['shippingid'];
          }
          if (isset($this->NM_ajax_info['param']['specifications']))
          {
              $this->specifications = $this->NM_ajax_info['param']['specifications'];
          }
          if (isset($this->NM_ajax_info['param']['subcategoryid']))
          {
              $this->subcategoryid = $this->NM_ajax_info['param']['subcategoryid'];
          }
          if (isset($this->NM_ajax_info['param']['taxable']))
          {
              $this->taxable = $this->NM_ajax_info['param']['taxable'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_products_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_products_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_products_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todo = explode("?@?", $nmgp_parms);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_products_mob($cadapar[1]);
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_products_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_products_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_products_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_products_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_products_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['form_products_mob']['parms']);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_products_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_products_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_products'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_products_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_products_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_products_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_products_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_products_mob') . "/form_products_mob.php";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_products_mob']['label'] = "" . $this->Ini->Nm_lang['lang_tble_products'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_products_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['measure'] = '' . $this->Ini->Nm_lang['lang_products_fild_measure'] . '';
      $this->nm_new_label['name'] = '' . $this->Ini->Nm_lang['lang_products_fild_name'] . '';
      $this->nm_new_label['picture'] = '' . $this->Ini->Nm_lang['lang_products_fild_picture'] . '';
      $this->nm_new_label['price'] = '' . $this->Ini->Nm_lang['lang_products_fild_price'] . '';
      $this->nm_new_label['taxable'] = '' . $this->Ini->Nm_lang['lang_products_fild_taxable'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_products_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_products_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "form_products_mob.php"; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['picture_ul_name']) && '' != $this->NM_ajax_info['param']['picture_ul_name'])
      {
          $this->picture         = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['picture_ul_name'];
          $this->picture_scfile_name    = substr($this->NM_ajax_info['param']['picture_ul_name'], 12);
          $this->picture_scfile_type    = $this->NM_ajax_info['param']['picture_ul_type'];
          $this->picture_ul_name = $this->NM_ajax_info['param']['picture_ul_name'];
          $this->picture_ul_type = $this->NM_ajax_info['param']['picture_ul_type'];
      }
      elseif (isset($this->picture_ul_name) && '' != $this->picture_ul_name)
      {
          $this->picture      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->picture_ul_name;
          $this->picture_scfile_name = substr($this->picture_ul_name, 12);
          $this->picture_scfile_type = $this->picture_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_products_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_products_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_products_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_products_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_products/form_products_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_products_mob_erro.class.php"); 
      }
      $this->Erro      = new form_products_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao']))
         { 
             if ($this->productid != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_products_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->productid)) { $this->nm_limpa_alfa($this->productid); }
      if (isset($this->shippingid)) { $this->nm_limpa_alfa($this->shippingid); }
      if (isset($this->measure)) { $this->nm_limpa_alfa($this->measure); }
      if (isset($this->categoryid)) { $this->nm_limpa_alfa($this->categoryid); }
      if (isset($this->subcategoryid)) { $this->nm_limpa_alfa($this->subcategoryid); }
      if (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
      if (isset($this->description)) { $this->nm_limpa_alfa($this->description); }
      if (isset($this->price)) { $this->nm_limpa_alfa($this->price); }
      if (isset($this->taxable)) { $this->nm_limpa_alfa($this->taxable); }
      if (isset($this->onhandquantity)) { $this->nm_limpa_alfa($this->onhandquantity); }
      if (isset($this->prod_active)) { $this->nm_limpa_alfa($this->prod_active); }
      if (isset($this->overview)) { $this->nm_limpa_alfa($this->overview); }
      if (isset($this->specifications)) { $this->nm_limpa_alfa($this->specifications); }
      if (isset($this->acessories)) { $this->nm_limpa_alfa($this->acessories); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "form_products_mob.php"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- categoryid
      $this->field_config['categoryid']               = array();
      $this->field_config['categoryid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['categoryid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['categoryid']['symbol_dec'] = '';
      $this->field_config['categoryid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['categoryid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- subcategoryid
      $this->field_config['subcategoryid']               = array();
      $this->field_config['subcategoryid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['subcategoryid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['subcategoryid']['symbol_dec'] = '';
      $this->field_config['subcategoryid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['subcategoryid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- price
      $this->field_config['price']               = array();
      $this->field_config['price']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['price']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['price']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['price']['symbol_mon'] = '';
      $this->field_config['price']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['price']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- shippingid
      $this->field_config['shippingid']               = array();
      $this->field_config['shippingid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['shippingid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['shippingid']['symbol_dec'] = '';
      $this->field_config['shippingid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['shippingid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- onhandquantity
      $this->field_config['onhandquantity']               = array();
      $this->field_config['onhandquantity']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['onhandquantity']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['onhandquantity']['symbol_dec'] = '';
      $this->field_config['onhandquantity']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['onhandquantity']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_productid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'productid');
          }
          if ('validate_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'name');
          }
          if ('validate_categoryid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'categoryid');
          }
          if ('validate_subcategoryid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'subcategoryid');
          }
          if ('validate_price' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'price');
          }
          if ('validate_shippingid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'shippingid');
          }
          if ('validate_taxable' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'taxable');
          }
          if ('validate_onhandquantity' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'onhandquantity');
          }
          if ('validate_measure' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'measure');
          }
          if ('validate_description' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'description');
          }
          if ('validate_picture' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'picture');
          }
          if ('validate_overview' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'overview');
          }
          if ('validate_specifications' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'specifications');
          }
          if ('validate_acessories' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acessories');
          }
          if ('validate_prod_active' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prod_active');
          }
          form_products_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_products_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_products_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_products_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && $this->nmgp_opcao != "menu_link")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_products_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_products_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'productid':
               return "Productid";
               break;
           case 'name':
               return "" . $this->Ini->Nm_lang['lang_products_fild_name'] . "";
               break;
           case 'categoryid':
               return "Categoryid";
               break;
           case 'subcategoryid':
               return "Subcategoryid";
               break;
           case 'price':
               return "" . $this->Ini->Nm_lang['lang_products_fild_price'] . "";
               break;
           case 'shippingid':
               return "Shippingid";
               break;
           case 'taxable':
               return "" . $this->Ini->Nm_lang['lang_products_fild_taxable'] . "";
               break;
           case 'onhandquantity':
               return "Onhandquantity";
               break;
           case 'measure':
               return "" . $this->Ini->Nm_lang['lang_products_fild_measure'] . "";
               break;
           case 'description':
               return "description";
               break;
           case 'picture':
               return "" . $this->Ini->Nm_lang['lang_products_fild_picture'] . "";
               break;
           case 'overview':
               return "overview";
               break;
           case 'specifications':
               return "specifications";
               break;
           case 'acessories':
               return "acessories";
               break;
           case 'prod_active':
               return "Prod Active";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ('' == $filtro || 'productid' == $filtro)
        $this->ValidateField_productid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'name' == $filtro)
        $this->ValidateField_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'categoryid' == $filtro)
        $this->ValidateField_categoryid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'subcategoryid' == $filtro)
        $this->ValidateField_subcategoryid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'price' == $filtro)
        $this->ValidateField_price($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'shippingid' == $filtro)
        $this->ValidateField_shippingid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'taxable' == $filtro)
        $this->ValidateField_taxable($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'onhandquantity' == $filtro)
        $this->ValidateField_onhandquantity($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'measure' == $filtro)
        $this->ValidateField_measure($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'description' == $filtro)
        $this->ValidateField_description($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'picture' == $filtro)
        $this->ValidateField_picture($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'overview' == $filtro)
        $this->ValidateField_overview($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'specifications' == $filtro)
        $this->ValidateField_specifications($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'acessories' == $filtro)
        $this->ValidateField_acessories($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'prod_active' == $filtro)
        $this->ValidateField_prod_active($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_productid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->productid) != "")  
          { 
          } 
      } 
    } // ValidateField_productid

    function ValidateField_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['name'] == "on")) 
      { 
          if ($this->name == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_products_fild_name'] . "" ; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
                  {
                      $this->NM_ajax_info['errList']['name'] = array();
                  }
                  $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->name) > 255) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_products_fild_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
              {
                  $this->NM_ajax_info['errList']['name'] = array();
              }
              $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_name

    function ValidateField_categoryid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->categoryid, $this->field_config['categoryid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->categoryid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->categoryid) > $iTestSize)  
              { 
                  $Campos_Crit .= "Categoryid: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['categoryid']))
                  {
                      $Campos_Erros['categoryid'] = array();
                  }
                  $Campos_Erros['categoryid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['categoryid']) || !is_array($this->NM_ajax_info['errList']['categoryid']))
                  {
                      $this->NM_ajax_info['errList']['categoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['categoryid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->categoryid, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Categoryid; " ; 
                  if (!isset($Campos_Erros['categoryid']))
                  {
                      $Campos_Erros['categoryid'] = array();
                  }
                  $Campos_Erros['categoryid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['categoryid']) || !is_array($this->NM_ajax_info['errList']['categoryid']))
                  {
                      $this->NM_ajax_info['errList']['categoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['categoryid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['categoryid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['categoryid'] == "on") 
           { 
              $Campos_Falta[] = "Categoryid" ; 
              if (!isset($Campos_Erros['categoryid']))
              {
                  $Campos_Erros['categoryid'] = array();
              }
              $Campos_Erros['categoryid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['categoryid']) || !is_array($this->NM_ajax_info['errList']['categoryid']))
                  {
                      $this->NM_ajax_info['errList']['categoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['categoryid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_categoryid

    function ValidateField_subcategoryid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->subcategoryid, $this->field_config['subcategoryid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->subcategoryid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->subcategoryid) > $iTestSize)  
              { 
                  $Campos_Crit .= "Subcategoryid: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['subcategoryid']))
                  {
                      $Campos_Erros['subcategoryid'] = array();
                  }
                  $Campos_Erros['subcategoryid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['subcategoryid']) || !is_array($this->NM_ajax_info['errList']['subcategoryid']))
                  {
                      $this->NM_ajax_info['errList']['subcategoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['subcategoryid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->subcategoryid, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Subcategoryid; " ; 
                  if (!isset($Campos_Erros['subcategoryid']))
                  {
                      $Campos_Erros['subcategoryid'] = array();
                  }
                  $Campos_Erros['subcategoryid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['subcategoryid']) || !is_array($this->NM_ajax_info['errList']['subcategoryid']))
                  {
                      $this->NM_ajax_info['errList']['subcategoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['subcategoryid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['subcategoryid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['subcategoryid'] == "on") 
           { 
              $Campos_Falta[] = "Subcategoryid" ; 
              if (!isset($Campos_Erros['subcategoryid']))
              {
                  $Campos_Erros['subcategoryid'] = array();
              }
              $Campos_Erros['subcategoryid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['subcategoryid']) || !is_array($this->NM_ajax_info['errList']['subcategoryid']))
                  {
                      $this->NM_ajax_info['errList']['subcategoryid'] = array();
                  }
                  $this->NM_ajax_info['errList']['subcategoryid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_subcategoryid

    function ValidateField_price(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['price']['symbol_dec']))
      {
          $this->sc_remove_currency($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp'], $this->field_config['price']['symbol_mon']); 
          nm_limpa_valor($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp']) ; 
          if ('.' == substr($this->price, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->price, 1)))
              {
                  $this->price = '';
              }
              else
              {
                  $this->price = '0' . $this->price;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->price != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->price) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_products_fild_price'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['price']))
                  {
                      $Campos_Erros['price'] = array();
                  }
                  $Campos_Erros['price'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['price']) || !is_array($this->NM_ajax_info['errList']['price']))
                  {
                      $this->NM_ajax_info['errList']['price'] = array();
                  }
                  $this->NM_ajax_info['errList']['price'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->price, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_products_fild_price'] . "; " ; 
                  if (!isset($Campos_Erros['price']))
                  {
                      $Campos_Erros['price'] = array();
                  }
                  $Campos_Erros['price'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['price']) || !is_array($this->NM_ajax_info['errList']['price']))
                  {
                      $this->NM_ajax_info['errList']['price'] = array();
                  }
                  $this->NM_ajax_info['errList']['price'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['price']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['price'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_products_fild_price'] . "" ; 
              if (!isset($Campos_Erros['price']))
              {
                  $Campos_Erros['price'] = array();
              }
              $Campos_Erros['price'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['price']) || !is_array($this->NM_ajax_info['errList']['price']))
                  {
                      $this->NM_ajax_info['errList']['price'] = array();
                  }
                  $this->NM_ajax_info['errList']['price'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_price

    function ValidateField_shippingid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->shippingid, $this->field_config['shippingid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->shippingid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->shippingid) > $iTestSize)  
              { 
                  $Campos_Crit .= "Shippingid: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['shippingid']))
                  {
                      $Campos_Erros['shippingid'] = array();
                  }
                  $Campos_Erros['shippingid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['shippingid']) || !is_array($this->NM_ajax_info['errList']['shippingid']))
                  {
                      $this->NM_ajax_info['errList']['shippingid'] = array();
                  }
                  $this->NM_ajax_info['errList']['shippingid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->shippingid, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Shippingid; " ; 
                  if (!isset($Campos_Erros['shippingid']))
                  {
                      $Campos_Erros['shippingid'] = array();
                  }
                  $Campos_Erros['shippingid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['shippingid']) || !is_array($this->NM_ajax_info['errList']['shippingid']))
                  {
                      $this->NM_ajax_info['errList']['shippingid'] = array();
                  }
                  $this->NM_ajax_info['errList']['shippingid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['shippingid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['shippingid'] == "on") 
           { 
              $Campos_Falta[] = "Shippingid" ; 
              if (!isset($Campos_Erros['shippingid']))
              {
                  $Campos_Erros['shippingid'] = array();
              }
              $Campos_Erros['shippingid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['shippingid']) || !is_array($this->NM_ajax_info['errList']['shippingid']))
                  {
                      $this->NM_ajax_info['errList']['shippingid'] = array();
                  }
                  $this->NM_ajax_info['errList']['shippingid'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_shippingid

    function ValidateField_taxable(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->taxable == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['taxable']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['taxable'] == "on")
        { 
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_products_fild_taxable'] . "" ; 
          if (!isset($Campos_Erros['taxable']))
          {
              $Campos_Erros['taxable'] = array();
          }
          $Campos_Erros['taxable'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['taxable']) || !is_array($this->NM_ajax_info['errList']['taxable']))
                  {
                      $this->NM_ajax_info['errList']['taxable'] = array();
                  }
                  $this->NM_ajax_info['errList']['taxable'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->taxable != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable']) && !in_array($this->taxable, $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['taxable']))
              {
                  $Campos_Erros['taxable'] = array();
              }
              $Campos_Erros['taxable'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['taxable']) || !is_array($this->NM_ajax_info['errList']['taxable']))
              {
                  $this->NM_ajax_info['errList']['taxable'] = array();
              }
              $this->NM_ajax_info['errList']['taxable'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_taxable

    function ValidateField_onhandquantity(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->onhandquantity, $this->field_config['onhandquantity']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->onhandquantity != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->onhandquantity) > $iTestSize)  
              { 
                  $Campos_Crit .= "Onhandquantity: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['onhandquantity']))
                  {
                      $Campos_Erros['onhandquantity'] = array();
                  }
                  $Campos_Erros['onhandquantity'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['onhandquantity']) || !is_array($this->NM_ajax_info['errList']['onhandquantity']))
                  {
                      $this->NM_ajax_info['errList']['onhandquantity'] = array();
                  }
                  $this->NM_ajax_info['errList']['onhandquantity'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->onhandquantity, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Onhandquantity; " ; 
                  if (!isset($Campos_Erros['onhandquantity']))
                  {
                      $Campos_Erros['onhandquantity'] = array();
                  }
                  $Campos_Erros['onhandquantity'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['onhandquantity']) || !is_array($this->NM_ajax_info['errList']['onhandquantity']))
                  {
                      $this->NM_ajax_info['errList']['onhandquantity'] = array();
                  }
                  $this->NM_ajax_info['errList']['onhandquantity'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['onhandquantity']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['onhandquantity'] == "on") 
           { 
              $Campos_Falta[] = "Onhandquantity" ; 
              if (!isset($Campos_Erros['onhandquantity']))
              {
                  $Campos_Erros['onhandquantity'] = array();
              }
              $Campos_Erros['onhandquantity'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['onhandquantity']) || !is_array($this->NM_ajax_info['errList']['onhandquantity']))
                  {
                      $this->NM_ajax_info['errList']['onhandquantity'] = array();
                  }
                  $this->NM_ajax_info['errList']['onhandquantity'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_onhandquantity

    function ValidateField_measure(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->measure == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['measure']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['measure'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_products_fild_measure'] . "" ; 
          if (!isset($Campos_Erros['measure']))
          {
              $Campos_Erros['measure'] = array();
          }
          $Campos_Erros['measure'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['measure']) || !is_array($this->NM_ajax_info['errList']['measure']))
          {
              $this->NM_ajax_info['errList']['measure'] = array();
          }
          $this->NM_ajax_info['errList']['measure'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->measure) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']) && !in_array($this->measure, $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['measure']))
              {
                  $Campos_Erros['measure'] = array();
              }
              $Campos_Erros['measure'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['measure']) || !is_array($this->NM_ajax_info['errList']['measure']))
              {
                  $this->NM_ajax_info['errList']['measure'] = array();
              }
              $this->NM_ajax_info['errList']['measure'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_measure

    function ValidateField_description(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->description))
      {
          $this->description = NM_conv_charset($this->description, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      if (trim($this->description) == "<p> </p>")  
      { 
          $this->description = "";
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->description) != "")  
          { 
          } 
      } 
    } // ValidateField_description

    function ValidateField_picture(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            if ("" != $this->picture && "S" != $this->picture_limpa && !$teste_validade->ArqExtensao($this->picture, array()))
            {
                $Campos_Crit .= "{lang_products_fild_picture}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['picture']))
                {
                    $Campos_Erros['picture'] = array();
                }
                $Campos_Erros['picture'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['picture']) || !is_array($this->NM_ajax_info['errList']['picture']))
                {
                    $this->NM_ajax_info['errList']['picture'] = array();
                }
                $this->NM_ajax_info['errList']['picture'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_picture

    function ValidateField_overview(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->overview))
      {
          $this->overview = NM_conv_charset($this->overview, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      if (trim($this->overview) == "<p> </p>")  
      { 
          $this->overview = "";
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->overview) != "")  
          { 
          } 
      } 
    } // ValidateField_overview

    function ValidateField_specifications(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->specifications))
      {
          $this->specifications = NM_conv_charset($this->specifications, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      if (trim($this->specifications) == "<p> </p>")  
      { 
          $this->specifications = "";
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->specifications) != "")  
          { 
          } 
      } 
    } // ValidateField_specifications

    function ValidateField_acessories(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->acessories))
      {
          $this->acessories = NM_conv_charset($this->acessories, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      if (trim($this->acessories) == "<p> </p>")  
      { 
          $this->acessories = "";
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->acessories) != "")  
          { 
          } 
      } 
    } // ValidateField_acessories

    function ValidateField_prod_active(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->prod_active) > 1) 
          { 
              $Campos_Crit .= "Prod Active " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['prod_active']))
              {
                  $Campos_Erros['prod_active'] = array();
              }
              $Campos_Erros['prod_active'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['prod_active']) || !is_array($this->NM_ajax_info['errList']['prod_active']))
              {
                  $this->NM_ajax_info['errList']['prod_active'] = array();
              }
              $this->NM_ajax_info['errList']['prod_active'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_prod_active
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
      if ($this->nmgp_opcao == "incluir" && $this->picture == "" &&  $this->picture_limpa != "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture']))
      { 
          $this->picture = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture'];
      } 
      elseif ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->picture == "none") 
          { 
              $this->picture = ""; 
          } 
          if ($this->picture != "") 
          { 
              if ($nm_browser == "Opera")  
              { 
                  $this->picture_scfile_type = substr($this->picture_scfile_type, 0, strpos($this->picture_scfile_type, ";")) ; 
              } 
              if ($this->picture_scfile_type == "image/pjpeg" || $this->picture_scfile_type == "image/jpeg" || $this->picture_scfile_type == "image/gif" ||  
                  $this->picture_scfile_type == "image/png" || $this->picture_scfile_type == "image/x-png" || $this->picture_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->picture))  
                  { 
                      $reg_picture = file_get_contents($this->picture); 
                      $this->picture = $reg_picture; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_products_fild_picture'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->picture = "";
                      if (!isset($Campos_Erros['picture']))
                      {
                          $Campos_Erros['picture'] = array();
                      }
                      $Campos_Erros['picture'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['picture']) || !is_array($this->NM_ajax_info['errList']['picture']))
                      {
                          $this->NM_ajax_info['errList']['picture'] = array();
                      }
                      $this->NM_ajax_info['errList']['picture'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->picture = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_products_fild_picture'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['picture']))
                      {
                          $Campos_Erros['picture'] = array();
                      }
                      $Campos_Erros['picture'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['picture']) || !is_array($this->NM_ajax_info['errList']['picture']))
                      {
                          $this->NM_ajax_info['errList']['picture'] = array();
                      }
                      $this->NM_ajax_info['errList']['picture'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form']['picture']) && $this->picture_limpa != "S")
          {
              $this->picture = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form']['picture'];
          }
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['productid'] = $this->productid;
    $this->nmgp_dados_form['name'] = $this->name;
    $this->nmgp_dados_form['categoryid'] = $this->categoryid;
    $this->nmgp_dados_form['subcategoryid'] = $this->subcategoryid;
    $this->nmgp_dados_form['price'] = $this->price;
    $this->nmgp_dados_form['shippingid'] = $this->shippingid;
    $this->nmgp_dados_form['taxable'] = $this->taxable;
    $this->nmgp_dados_form['onhandquantity'] = $this->onhandquantity;
    $this->nmgp_dados_form['measure'] = $this->measure;
    $this->nmgp_dados_form['description'] = $this->description;
    if (empty($this->picture))
    {
        $this->picture = $this->nmgp_dados_form['picture'];
    }
    $this->nmgp_dados_form['picture'] = $this->picture;
    $this->nmgp_dados_form['picture_limpa'] = $this->picture_limpa;
    $this->nmgp_dados_form['overview'] = $this->overview;
    $this->nmgp_dados_form['specifications'] = $this->specifications;
    $this->nmgp_dados_form['acessories'] = $this->acessories;
    $this->nmgp_dados_form['prod_active'] = $this->prod_active;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->categoryid, $this->field_config['categoryid']['symbol_grp']) ; 
      nm_limpa_numero($this->subcategoryid, $this->field_config['subcategoryid']['symbol_grp']) ; 
      if (!empty($this->field_config['price']['symbol_dec']))
      {
         $this->sc_remove_currency($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp'], $this->field_config['price']['symbol_mon']);
         nm_limpa_valor($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp']);
      }
      nm_limpa_numero($this->shippingid, $this->field_config['shippingid']['symbol_grp']) ; 
      nm_limpa_numero($this->onhandquantity, $this->field_config['onhandquantity']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "categoryid")
      {
          nm_limpa_numero($this->categoryid, $this->field_config['categoryid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "subcategoryid")
      {
          nm_limpa_numero($this->subcategoryid, $this->field_config['subcategoryid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "price")
      {
          if (!empty($this->field_config['price']['symbol_dec']))
          {
             $this->sc_remove_currency($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp'], $this->field_config['price']['symbol_mon']);
             nm_limpa_valor($this->price, $this->field_config['price']['symbol_dec'], $this->field_config['price']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "shippingid")
      {
          nm_limpa_numero($this->shippingid, $this->field_config['shippingid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "onhandquantity")
      {
          nm_limpa_numero($this->onhandquantity, $this->field_config['onhandquantity']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->categoryid) || (!empty($format_fields) && isset($format_fields['categoryid'])))
      {
          nmgp_Form_Num_Val($this->categoryid, $this->field_config['categoryid']['symbol_grp'], $this->field_config['categoryid']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['categoryid']['symbol_fmt']) ; 
      }
      if (!empty($this->subcategoryid) || (!empty($format_fields) && isset($format_fields['subcategoryid'])))
      {
          nmgp_Form_Num_Val($this->subcategoryid, $this->field_config['subcategoryid']['symbol_grp'], $this->field_config['subcategoryid']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['subcategoryid']['symbol_fmt']) ; 
      }
      if (!empty($this->price) || (!empty($format_fields) && isset($format_fields['price'])))
      {
          nmgp_Form_Num_Val($this->price, $this->field_config['price']['symbol_grp'], $this->field_config['price']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['price']['symbol_fmt']) ; 
      }
      if (!empty($this->shippingid) || (!empty($format_fields) && isset($format_fields['shippingid'])))
      {
          nmgp_Form_Num_Val($this->shippingid, $this->field_config['shippingid']['symbol_grp'], $this->field_config['shippingid']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['shippingid']['symbol_fmt']) ; 
      }
      if (!empty($this->onhandquantity) || (!empty($format_fields) && isset($format_fields['onhandquantity'])))
      {
          nmgp_Form_Num_Val($this->onhandquantity, $this->field_config['onhandquantity']['symbol_grp'], $this->field_config['onhandquantity']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['onhandquantity']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_productid();
          $this->ajax_return_values_name();
          $this->ajax_return_values_categoryid();
          $this->ajax_return_values_subcategoryid();
          $this->ajax_return_values_price();
          $this->ajax_return_values_shippingid();
          $this->ajax_return_values_taxable();
          $this->ajax_return_values_onhandquantity();
          $this->ajax_return_values_measure();
          $this->ajax_return_values_description();
          $this->ajax_return_values_picture();
          $this->ajax_return_values_overview();
          $this->ajax_return_values_specifications();
          $this->ajax_return_values_acessories();
          $this->ajax_return_values_prod_active();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['productid']['keyVal'] = form_products_mob_pack_protect_string($this->nmgp_dados_form['productid']);
          }
   } // ajax_return_values

          //----- productid
   function ajax_return_values_productid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("productid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->productid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['productid'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- name
   function ajax_return_values_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- categoryid
   function ajax_return_values_categoryid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("categoryid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->categoryid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['categoryid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- subcategoryid
   function ajax_return_values_subcategoryid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("subcategoryid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->subcategoryid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['subcategoryid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- price
   function ajax_return_values_price($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("price", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->price);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['price'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- shippingid
   function ajax_return_values_shippingid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("shippingid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->shippingid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['shippingid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- taxable
   function ajax_return_values_taxable($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("taxable", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->taxable);
              $aLookup = array();
              $this->_tmp_lookup_taxable = $this->taxable;

$aLookup[] = array(form_products_mob_pack_protect_string('Y') => form_products_mob_pack_protect_string("Yes"));
$aLookup[] = array(form_products_mob_pack_protect_string('N') => form_products_mob_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['taxable']) && !empty($this->NM_ajax_info['select_html']['taxable']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['taxable'];
          }
          $this->NM_ajax_info['fldList']['taxable'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['taxable']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['taxable']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['taxable']['labList'] = $aLabel;
          }
   }

          //----- onhandquantity
   function ajax_return_values_onhandquantity($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("onhandquantity", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->onhandquantity);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['onhandquantity'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- measure
   function ajax_return_values_measure($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("measure", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->measure);
              $aLookup = array();
              $this->_tmp_lookup_measure = $this->measure;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array(); 
}
$aLookup[] = array(form_products_mob_pack_protect_string('') => form_products_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_productid = $this->productid;
   $old_value_categoryid = $this->categoryid;
   $old_value_subcategoryid = $this->subcategoryid;
   $old_value_price = $this->price;
   $old_value_shippingid = $this->shippingid;
   $old_value_onhandquantity = $this->onhandquantity;
   $this->nm_tira_formatacao();


   $unformatted_value_productid = $this->productid;
   $unformatted_value_categoryid = $this->categoryid;
   $unformatted_value_subcategoryid = $this->subcategoryid;
   $unformatted_value_price = $this->price;
   $unformatted_value_shippingid = $this->shippingid;
   $unformatted_value_onhandquantity = $this->onhandquantity;

   $nm_comando = "SELECT measureId, description 
FROM measure 
ORDER BY description";

   $this->productid = $old_value_productid;
   $this->categoryid = $old_value_categoryid;
   $this->subcategoryid = $old_value_subcategoryid;
   $this->price = $old_value_price;
   $this->shippingid = $old_value_shippingid;
   $this->onhandquantity = $old_value_onhandquantity;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_products_mob_pack_protect_string($rs->fields[0]) => form_products_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"measure\"";
          if (isset($this->NM_ajax_info['select_html']['measure']) && !empty($this->NM_ajax_info['select_html']['measure']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['measure'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->measure == $sValue)
                  {
                      $this->_tmp_lookup_measure = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['measure'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['measure']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['measure']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['measure']['labList'] = $aLabel;
          }
   }

          //----- description
   function ajax_return_values_description($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("description", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->description);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['description'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- picture
   function ajax_return_values_picture($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("picture", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->picture);
              $aLookup = array();
   $out_picture = '';
   $out1_picture = '';
   if ('' != $this->picture_ul_name && @is_file($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->picture_ul_name))
   {
       $this->picture = @file_get_contents($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->picture_ul_name);
   }
   if ($this->picture != "" && $this->picture != "none")   
   { 
       $out_picture = $this->Ini->path_imag_temp . "/sc_picture_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_picture = $out_picture; 
       $arq_picture = fopen($this->Ini->root . $out_picture, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->picture, 0, 12));
           if (substr($this->picture, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->picture = nm_conv_img_access($this->picture);
           } 
       } 
       if (substr($this->picture, 0, 4) == "*nm*") 
       { 
           $this->picture = substr($this->picture, 4) ; 
           $this->picture = base64_decode($this->picture) ; 
       } 
       $img_pos_bm = strpos($this->picture, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->picture = substr($this->picture, $img_pos_bm) ; 
       } 
       fwrite($arq_picture, $this->picture) ;  
       fclose($arq_picture) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_picture);
       $this->nmgp_return_img['picture'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['picture'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_picture = $this->Ini->path_imag_temp . "/sc_" . "picture_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_picture);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_picture);
       } 
       else 
       { 
           $out_picture = $out1_picture;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['picture'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_picture,
               'imgOrig' => $out1_picture,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- overview
   function ajax_return_values_overview($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("overview", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->overview);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['overview'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- specifications
   function ajax_return_values_specifications($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("specifications", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->specifications);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['specifications'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acessories
   function ajax_return_values_acessories($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acessories", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acessories);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acessories'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- prod_active
   function ajax_return_values_prod_active($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prod_active", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prod_active);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['prod_active'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->price = str_replace($sc_parm1, $sc_parm2, $this->price); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->price = "'" . $this->price . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->price = str_replace("'", "", $this->price); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if ($this->nmgp_opcao != "incluir")  
      {
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture']);
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_products_mob']['contr_erro'] = 'on';
 


     
     
      $nm_select = "SELECT COUNT(*) FROM orderitens
        WHERE productId = '" . $this->productid  . "'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_orderItens = array();
      $this->dataset_orderitens = array();
     if ($this->productid !== "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_orderItens[$y] [$x] = $rx->fields[$x];
                      $this->dataset_orderitens[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_orderItens = false;
          $this->dataset_orderItens_erro = $this->Db->ErrorMsg();
          $this->dataset_orderitens = false;
          $this->dataset_orderitens_erro = $this->Db->ErrorMsg();
      } 
     } 
;

    if($this->dataset_orderitens[0][0] > 0)
    {
        
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_country_product'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_products_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_country_product'] ;
 }
;
    }
$_SESSION['scriptcase']['form_products_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['productid'] = $this->productid;
      $NM_val_form['name'] = $this->name;
      $NM_val_form['categoryid'] = $this->categoryid;
      $NM_val_form['subcategoryid'] = $this->subcategoryid;
      $NM_val_form['price'] = $this->price;
      $NM_val_form['shippingid'] = $this->shippingid;
      $NM_val_form['taxable'] = $this->taxable;
      $NM_val_form['onhandquantity'] = $this->onhandquantity;
      $NM_val_form['measure'] = $this->measure;
      $NM_val_form['description'] = $this->description;
      $NM_val_form['picture'] = $this->picture;
      $NM_val_form['overview'] = $this->overview;
      $NM_val_form['specifications'] = $this->specifications;
      $NM_val_form['acessories'] = $this->acessories;
      $NM_val_form['prod_active'] = $this->prod_active;
      if ($this->productid == "")  
      { 
          $this->productid = 0;
      } 
      if ($this->shippingid == "")  
      { 
          $this->shippingid = 0;
          $this->sc_force_zero[] = 'shippingid';
      } 
      if ($this->measure == "")  
      { 
          $this->measure = 0;
          $this->sc_force_zero[] = 'measure';
      } 
      if ($this->categoryid == "")  
      { 
          $this->categoryid = 0;
          $this->sc_force_zero[] = 'categoryid';
      } 
      if ($this->subcategoryid == "")  
      { 
          $this->subcategoryid = 0;
          $this->sc_force_zero[] = 'subcategoryid';
      } 
      if ($this->price == "")  
      { 
          $this->price = 0;
          $this->sc_force_zero[] = 'price';
      } 
      if ($this->onhandquantity == "")  
      { 
          $this->onhandquantity = 0;
          $this->sc_force_zero[] = 'onhandquantity';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->name_before_qstr = $this->name;
          $this->name = substr($this->Db->qstr($this->name), 1, -1); 
          if ($this->name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->name = "null"; 
              $NM_val_null[] = "name";
          } 
          $this->description_before_qstr = $this->description;
          $this->description = substr($this->Db->qstr($this->description), 1, -1); 
          if ($this->description == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->description = "null"; 
              $NM_val_null[] = "description";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
           $nm_tmp = nm_conv_img_access(substr($this->picture, 0, 12));
           if (substr($this->picture, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->picture = nm_conv_img_access($this->picture);
           } 
              if (!empty($this->picture) && $this->picture != 'null' && substr($this->picture, 0, 4) != "*nm*") 
              { 
                  $this->picture = "*nm*" . base64_encode($this->picture) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->picture) && $this->picture != 'null' && substr($this->picture, 0, 4) != "*nm*") 
              { 
                  $this->picture = "*nm*" . base64_encode($this->picture) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if (!empty($this->picture) && $this->picture != 'null' && substr($this->picture, 0, 4) != "*nm*") 
              { 
                  $this->picture = "*nm*" . base64_encode($this->picture) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          else
          { 
              $this->picture =  addslashes($this->picture);
          } 
          if ($this->picture == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->picture = "null"; 
              $NM_val_null[] = "picture";
          } 
          $this->taxable_before_qstr = $this->taxable;
          $this->taxable = substr($this->Db->qstr($this->taxable), 1, -1); 
          if ($this->taxable == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->taxable = "null"; 
              $NM_val_null[] = "taxable";
          } 
          $this->prod_active_before_qstr = $this->prod_active;
          $this->prod_active = substr($this->Db->qstr($this->prod_active), 1, -1); 
          if ($this->prod_active == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->prod_active = "null"; 
              $NM_val_null[] = "prod_active";
          } 
          $this->overview_before_qstr = $this->overview;
          $this->overview = substr($this->Db->qstr($this->overview), 1, -1); 
          if ($this->overview == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->overview = "null"; 
              $NM_val_null[] = "overview";
          } 
          $this->specifications_before_qstr = $this->specifications;
          $this->specifications = substr($this->Db->qstr($this->specifications), 1, -1); 
          if ($this->specifications == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->specifications = "null"; 
              $NM_val_null[] = "specifications";
          } 
          $this->acessories_before_qstr = $this->acessories;
          $this->acessories = substr($this->Db->qstr($this->acessories), 1, -1); 
          if ($this->acessories == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acessories = "null"; 
              $NM_val_null[] = "acessories";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_products_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET shippingid = $this->shippingid, measure = $this->measure, categoryid = $this->categoryid, subcategoryid = $this->subcategoryid, name = '$this->name', description = '$this->description', price = $this->price, taxable = '$this->taxable', onhandquantity = $this->onhandquantity, prod_active = '$this->prod_active', overview = '$this->overview', specifications = '$this->specifications', acessories = '$this->acessories'";  
              } 
              $temp_cmd_sql = "";
              if ($this->picture_limpa == "S") 
              { 
                  if ($this->picture != "null") 
                  { 
                      $this->picture = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", picture = '" . $this->picture . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " picture = '" . $this->picture . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->picture = "";
              } 
              else 
              { 
                  if ($this->picture != "none" && $this->picture != "") 
                  { 
                      $NM_conteudo =  $this->picture;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", picture = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " picture = '$NM_conteudo'" ; 
                          $SC_ex_update = true; 
                      } 
                  } 
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->picture_limpa == "S" || ($this->picture != "none" && $this->picture != "")) 
              { 
                  if ($SC_ex_upd_or) 
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= ", picture = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= ", picture = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= ", picture = empty_blob()"; 
                      } 
                  } 
                  else 
                  { 
                      $SC_ex_upd_or = true; 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= " picture = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= " picture = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= " picture = empty_blob()"; 
                      } 
                  } 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE productid = $this->productid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE productid = $this->productid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE productid = $this->productid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE productid = $this->productid ";  
              }  
              else  
              {
                  $comando .= " WHERE productid = $this->productid ";  
              }  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_products_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->picture_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"picture\", \"\",  \"productid = $this->productid\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "picture", "",  "productid = $this->productid"); 
                  } 
                  else 
                  { 
                      if ($this->picture != "none" && $this->picture != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"picture\", $this->picture,  \"productid = $this->productid\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "picture", $this->picture,  "productid = $this->productid"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_products_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->picture_limpa == "S")
              {
              }
          $this->name = $this->name_before_qstr;
          $this->description = $this->description_before_qstr;
          $this->taxable = $this->taxable_before_qstr;
          $this->prod_active = $this->prod_active_before_qstr;
          $this->overview = $this->overview_before_qstr;
          $this->specifications = $this->specifications_before_qstr;
          $this->acessories = $this->acessories_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['productid'])) { $this->productid = $NM_val_form['productid']; }
              elseif (isset($this->productid)) { $this->nm_limpa_alfa($this->productid); }
              if     (isset($NM_val_form) && isset($NM_val_form['shippingid'])) { $this->shippingid = $NM_val_form['shippingid']; }
              elseif (isset($this->shippingid)) { $this->nm_limpa_alfa($this->shippingid); }
              if     (isset($NM_val_form) && isset($NM_val_form['measure'])) { $this->measure = $NM_val_form['measure']; }
              elseif (isset($this->measure)) { $this->nm_limpa_alfa($this->measure); }
              if     (isset($NM_val_form) && isset($NM_val_form['categoryid'])) { $this->categoryid = $NM_val_form['categoryid']; }
              elseif (isset($this->categoryid)) { $this->nm_limpa_alfa($this->categoryid); }
              if     (isset($NM_val_form) && isset($NM_val_form['subcategoryid'])) { $this->subcategoryid = $NM_val_form['subcategoryid']; }
              elseif (isset($this->subcategoryid)) { $this->nm_limpa_alfa($this->subcategoryid); }
              if     (isset($NM_val_form) && isset($NM_val_form['name'])) { $this->name = $NM_val_form['name']; }
              elseif (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
              if     (isset($NM_val_form) && isset($NM_val_form['description'])) { $this->description = $NM_val_form['description']; }
              elseif (isset($this->description)) { $this->nm_limpa_alfa($this->description); }
              if     (isset($NM_val_form) && isset($NM_val_form['price'])) { $this->price = $NM_val_form['price']; }
              elseif (isset($this->price)) { $this->nm_limpa_alfa($this->price); }
              if     (isset($NM_val_form) && isset($NM_val_form['taxable'])) { $this->taxable = $NM_val_form['taxable']; }
              elseif (isset($this->taxable)) { $this->nm_limpa_alfa($this->taxable); }
              if     (isset($NM_val_form) && isset($NM_val_form['onhandquantity'])) { $this->onhandquantity = $NM_val_form['onhandquantity']; }
              elseif (isset($this->onhandquantity)) { $this->nm_limpa_alfa($this->onhandquantity); }
              if     (isset($NM_val_form) && isset($NM_val_form['prod_active'])) { $this->prod_active = $NM_val_form['prod_active']; }
              elseif (isset($this->prod_active)) { $this->nm_limpa_alfa($this->prod_active); }
              if     (isset($NM_val_form) && isset($NM_val_form['overview'])) { $this->overview = $NM_val_form['overview']; }
              elseif (isset($this->overview)) { $this->nm_limpa_alfa($this->overview); }
              if     (isset($NM_val_form) && isset($NM_val_form['specifications'])) { $this->specifications = $NM_val_form['specifications']; }
              elseif (isset($this->specifications)) { $this->nm_limpa_alfa($this->specifications); }
              if     (isset($NM_val_form) && isset($NM_val_form['acessories'])) { $this->acessories = $NM_val_form['acessories']; }
              elseif (isset($this->acessories)) { $this->nm_limpa_alfa($this->acessories); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array('productid', 'name', 'categoryid', 'subcategoryid', 'price', 'shippingid', 'taxable', 'onhandquantity', 'measure', 'description', 'picture', 'overview', 'specifications', 'acessories', 'prod_active');
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $NM_seq_auto = "NEXT VALUE FOR products_productid_seq, ";
              $NM_cmp_auto = "productid, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $NM_seq_auto = "products_productid_seq.NEXTVAL, ";
              $NM_cmp_auto = "productid, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $NM_seq_auto = "nextval('products_productid_seq'), ";
              $NM_cmp_auto = "productid, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $NM_seq_auto = "gen_id(products_productid_seq, 1), ";
              $NM_cmp_auto = "productid, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "productid, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_products_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES ($this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', '$this->picture', $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES ($this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', '$this->picture', $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES (" . $NM_seq_auto . "$this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', null, $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES (" . $NM_seq_auto . "$this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', null, $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES (" . $NM_seq_auto . "$this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', null, $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories) VALUES (" . $NM_seq_auto . "$this->shippingid, $this->measure, $this->categoryid, $this->subcategoryid, '$this->name', '$this->description', '$this->picture', $this->price, '$this->taxable', $this->onhandquantity, '$this->prod_active', '$this->overview', '$this->specifications', '$this->acessories')"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_products_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_products_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->productid =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select products_productid_seq.currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "values PREVVAL FOR products_productid_seq"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('products_productid_seq')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(products_productid_seq, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->productid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->picture ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  picture , $this->picture,  \"productid = $this->productid\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "picture", $this->picture,  "productid = $this->productid"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_products_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->productid = substr($this->Db->qstr($this->productid), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where productid = $this->productid "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_products_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['parms'] = "productid?#?$this->productid?@?"; 
      }
      $this->nmgp_dados_form[picture] = ""; 
      $this->picture_limpa = ""; 
      $this->picture_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->productid = substr($this->Db->qstr($this->productid), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->productid)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->productid) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_products_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total'] = $qt_geral_reg_form_products_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->productid))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "productid < $this->productid "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "productid < $this->productid "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "productid < $this->productid "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "productid < $this->productid "; 
              }
              else  
              {
                  $Key_Where = "productid < $this->productid "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_products_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] > $qt_geral_reg_form_products_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = $qt_geral_reg_form_products_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = $qt_geral_reg_form_products_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT productid, shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT productid, shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT productid, shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT productid, shippingid, measure, categoryid, subcategoryid, name, description, LOTOFILE(picture, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_picture', 'client'), price, taxable, onhandquantity, prod_active, overview, specifications, acessories from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT productid, shippingid, measure, categoryid, subcategoryid, name, description, picture, price, taxable, onhandquantity, prod_active, overview, specifications, acessories from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "productid = $this->productid"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "productid = $this->productid"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "productid = $this->productid"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "productid = $this->productid"; 
              }  
              else  
              {
                  $aWhere[] = "productid = $this->productid"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "productid";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->nmgp_botoes['first']   = "off";
                  $this->nmgp_botoes['back']    = "off";
                  $this->nmgp_botoes['forward'] = "off";
                  $this->nmgp_botoes['last']    = "off";
                  $this->nmgp_botoes['update']  = "off";
                  $this->nmgp_botoes['delete']  = "off";
                  $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->nmgp_botoes['first']   = "off";
                  $this->nmgp_botoes['back']    = "off";
                  $this->nmgp_botoes['forward'] = "off";
                  $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->productid = $rs->fields[0] ; 
              $this->nmgp_dados_select['productid'] = $this->productid;
              $this->shippingid = $rs->fields[1] ; 
              $this->nmgp_dados_select['shippingid'] = $this->shippingid;
              $this->measure = $rs->fields[2] ; 
              $this->nmgp_dados_select['measure'] = $this->measure;
              $this->categoryid = $rs->fields[3] ; 
              $this->nmgp_dados_select['categoryid'] = $this->categoryid;
              $this->subcategoryid = $rs->fields[4] ; 
              $this->nmgp_dados_select['subcategoryid'] = $this->subcategoryid;
              $this->name = $rs->fields[5] ; 
              $this->nmgp_dados_select['name'] = $this->name;
              $this->description = $rs->fields[6] ; 
              $this->nmgp_dados_select['description'] = $this->description;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->picture = $this->Db->BlobDecode($rs->fields[7]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[7]) && !empty($rs->fields[7]) && is_file($rs->fields[7])) 
                  { 
                     $this->picture = file_get_contents($rs->fields[7]);
                  }else 
                  { 
                     $this->picture = ''; 
                  } 
              } 
              else
              { 
                  $this->picture = $rs->fields[7] ; 
              } 
              $this->nmgp_dados_select['picture'] = $this->picture;
              $this->price = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['price'] = $this->price;
              $this->taxable = $rs->fields[9] ; 
              $this->nmgp_dados_select['taxable'] = $this->taxable;
              $this->onhandquantity = $rs->fields[10] ; 
              $this->nmgp_dados_select['onhandquantity'] = $this->onhandquantity;
              $this->prod_active = $rs->fields[11] ; 
              $this->nmgp_dados_select['prod_active'] = $this->prod_active;
              $this->overview = $rs->fields[12] ; 
              $this->nmgp_dados_select['overview'] = $this->overview;
              $this->specifications = $rs->fields[13] ; 
              $this->nmgp_dados_select['specifications'] = $this->specifications;
              $this->acessories = $rs->fields[14] ; 
              $this->nmgp_dados_select['acessories'] = $this->acessories;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->productid = (string)$this->productid; 
              $this->shippingid = (string)$this->shippingid; 
              $this->measure = (string)$this->measure; 
              $this->categoryid = (string)$this->categoryid; 
              $this->subcategoryid = (string)$this->subcategoryid; 
              $this->price = (strpos(strtolower($this->price), "e")) ? (float)$this->price : $this->price; 
              $this->price = (string)$this->price; 
              $this->onhandquantity = (string)$this->onhandquantity; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['parms'] = "productid?#?$this->productid?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['reg_start'] < $qt_geral_reg_form_products_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->productid = "" ;  
              $this->shippingid = "" ;  
              $this->measure = "" ;  
              $this->categoryid = "" ;  
              $this->subcategoryid = "" ;  
              $this->name = "" ;  
              $this->description = "" ;  
              $this->picture = "" ;  
              $this->picture_ul_name = "" ;  
              $this->picture_ul_type = "" ;  
              $this->price = "" ;  
              $this->taxable = "" ;  
              $this->onhandquantity = "" ;  
              $this->prod_active = "" ;  
              $this->overview = "" ;  
              $this->specifications = "" ;  
              $this->acessories = "" ;  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture']);  
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_select'];
                  $this->shippingid = $this->nmgp_dados_select['shippingid'];  
                  $this->measure = $this->nmgp_dados_select['measure'];  
                  $this->categoryid = $this->nmgp_dados_select['categoryid'];  
                  $this->subcategoryid = $this->nmgp_dados_select['subcategoryid'];  
                  $this->name = $this->nmgp_dados_select['name'];  
                  $this->description = $this->nmgp_dados_select['description'];  
                  $this->picture = $this->nmgp_dados_select['picture'];  
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['dados_clone']['picture'] = $this->nmgp_dados_select['picture'];  
                  $this->price = $this->nmgp_dados_select['price'];  
                  $this->taxable = $this->nmgp_dados_select['taxable'];  
                  $this->onhandquantity = $this->nmgp_dados_select['onhandquantity'];  
                  $this->prod_active = $this->nmgp_dados_select['prod_active'];  
                  $this->overview = $this->nmgp_dados_select['overview'];  
                  $this->specifications = $this->nmgp_dados_select['specifications'];  
                  $this->acessories = $this->nmgp_dados_select['acessories'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " where productid < $this->productid" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->productid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " where productid > $this->productid" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->productid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->productid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(productid) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->productid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_products_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_picture = "";  
   } 
   else 
   { 
       $out_picture = $this->picture;  
   } 
   if ($this->picture != "" && $this->picture != "none")   
   { 
       $out_picture = $this->Ini->path_imag_temp . "/sc_picture_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_picture = fopen($this->Ini->root . $out_picture, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->picture, 0, 12));
           if (substr($this->picture, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->picture = nm_conv_img_access($this->picture);
           } 
       } 
       if (substr($this->picture, 0, 4) == "*nm*") 
       { 
           $this->picture = substr($this->picture, 4) ; 
           $this->picture = base64_decode($this->picture) ; 
       } 
       $img_pos_bm = strpos($this->picture, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->picture = substr($this->picture, $img_pos_bm) ; 
       } 
       fwrite($arq_picture, $this->picture) ;  
       fclose($arq_picture) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_picture);
       $this->nmgp_return_img['picture'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['picture'][1] = $sc_obj_img->getWidth();
       $out1_picture = $out_picture; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_picture = $this->Ini->path_imag_temp . "/sc_" . "picture_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_picture);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_picture);
       } 
       else 
       { 
           $out_picture = $out1_picture;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_picture;
       if (isset($temp_out_picture))
       {
           $out_picture = $temp_out_picture;
       }
       global $temp_out1_picture;
       if (isset($temp_out1_picture))
       {
           $out1_picture = $temp_out1_picture;
       }
   }
        include_once("form_products_mob_form0.php");
        include_once("form_products_mob_form1.php");
        include_once("form_products_mob_form2.php");
        include_once("form_products_mob_form3.php");
        include_once("form_products_mob_form4.php");
        include_once("form_products_mob_form5.php");
 }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_products_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opc_ant']);
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_products_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo NM_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
