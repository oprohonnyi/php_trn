<?php

class grid_products_dependent_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_products_dependent_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_products_dependent']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_products_dependent']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->categoryid = $Busca_temp['categoryid']; 
          $tmp_pos = strpos($this->categoryid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->categoryid = substr($this->categoryid, 0, $tmp_pos);
          }
          $this->shippingid = $Busca_temp['shippingid']; 
          $tmp_pos = strpos($this->shippingid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shippingid = substr($this->shippingid, 0, $tmp_pos);
          }
          $this->measure = $Busca_temp['measure']; 
          $tmp_pos = strpos($this->measure, "##@@");
          if ($tmp_pos !== false)
          {
              $this->measure = substr($this->measure, 0, $tmp_pos);
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false)
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
          $this->taxable = $Busca_temp['taxable']; 
          $tmp_pos = strpos($this->taxable, "##@@");
          if ($tmp_pos !== false)
          {
              $this->taxable = substr($this->taxable, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $shippingid, $measure, $categoryid, $subcategoryid;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['contr_total_geral'] = "OK";
   } 

   //-----  categoryid
   function quebra_categoryid_groupby_1($categoryid, $arg_sum_categoryid) 
   {
      global $tot_categoryid , $shippingid, $measure, $categoryid, $subcategoryid;  
      $tot_categoryid = array() ;  
      $tot_categoryid[0] = $categoryid ; 
   }
   //-----  subcategoryid
   function quebra_subcategoryid_groupby_1($categoryid, $subcategoryid, $arg_sum_categoryid, $arg_sum_subcategoryid) 
   {
      global $tot_subcategoryid , $shippingid, $measure, $categoryid, $subcategoryid;  
      $tot_subcategoryid = array() ;  
      $tot_subcategoryid[0] = $subcategoryid ; 
   }

   //----- 
   function resumo_groupby_1($destino_resumo, &$array_total_categoryid, &$array_total_subcategoryid)
   {
      global $nada, $nm_lang, $shippingid, $measure, $categoryid, $subcategoryid;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->categoryid = $Busca_temp['categoryid']; 
       $tmp_pos = strpos($this->categoryid, "##@@");
       if ($tmp_pos !== false)
       {
           $this->categoryid = substr($this->categoryid, 0, $tmp_pos);
       }
       $this->shippingid = $Busca_temp['shippingid']; 
       $tmp_pos = strpos($this->shippingid, "##@@");
       if ($tmp_pos !== false)
       {
           $this->shippingid = substr($this->shippingid, 0, $tmp_pos);
       }
       $this->measure = $Busca_temp['measure']; 
       $tmp_pos = strpos($this->measure, "##@@");
       if ($tmp_pos !== false)
       {
           $this->measure = substr($this->measure, 0, $tmp_pos);
       }
       $this->name = $Busca_temp['name']; 
       $tmp_pos = strpos($this->name, "##@@");
       if ($tmp_pos !== false)
       {
           $this->name = substr($this->name, 0, $tmp_pos);
       }
       $this->taxable = $Busca_temp['taxable']; 
       $tmp_pos = strpos($this->taxable, "##@@");
       if ($tmp_pos !== false)
       {
           $this->taxable = substr($this->taxable, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq_filtro'];
   $nmgp_order_by = " order by categoryid asc, subcategoryid asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), categoryid, subcategoryid from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by categoryid, subcategoryid  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), categoryid, subcategoryid from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by categoryid, subcategoryid  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $comando  = "select count(*), categoryid, subcategoryid from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by categoryid, subcategoryid  " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), categoryid, subcategoryid from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by categoryid, subcategoryid  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $categoryid      = $registro[1];
         $categoryid_orig = $registro[1];
         $conteudo = $registro[1];
         $this->Lookup->lookup_categoryid($conteudo , $categoryid_orig) ; 
         $categoryid = $conteudo;
         if (null === $categoryid)
         {
             $categoryid = '';
         }
         if (null === $categoryid_orig)
         {
             $categoryid_orig = '';
         }
         $val_grafico_categoryid = $categoryid;
         $subcategoryid      = $registro[2];
         $subcategoryid_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_subcategoryid($conteudo , $categoryid_orig, $subcategoryid_orig) ; 
         $subcategoryid = $conteudo;
         if (null === $subcategoryid)
         {
             $subcategoryid = '';
         }
         if (null === $subcategoryid_orig)
         {
             $subcategoryid_orig = '';
         }
         $val_grafico_subcategoryid = $subcategoryid;
         $categoryid_orig = NM_encode_input($categoryid_orig);
         if (isset($categoryid_orig))
         {
            //-----  categoryid
            if (!isset($array_total_categoryid[$categoryid_orig]))
            {
               $array_total_categoryid[$categoryid_orig][0] = $registro[0];
               $array_total_categoryid[$categoryid_orig][1] = NM_encode_input($val_grafico_categoryid);
               $array_total_categoryid[$categoryid_orig][2] = $categoryid_orig;
            }
            else
            {
               $array_total_categoryid[$categoryid_orig][0] += $registro[0];
            }
            $subcategoryid_orig = NM_encode_input($subcategoryid_orig);
            if (isset($subcategoryid_orig))
            {
               //-----  subcategoryid
               if (!isset($array_total_subcategoryid[$categoryid_orig][$subcategoryid_orig]))
               {
                  $array_total_subcategoryid[$categoryid_orig][$subcategoryid_orig][0] = $registro[0];
                  $array_total_subcategoryid[$categoryid_orig][$subcategoryid_orig][1] = NM_encode_input($val_grafico_subcategoryid);
                  $array_total_subcategoryid[$categoryid_orig][$subcategoryid_orig][2] = $subcategoryid_orig;
               }
               else
               {
                  $array_total_subcategoryid[$categoryid_orig][$subcategoryid_orig][0] += $registro[0];
               }
            } // isset
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }

   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
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
              if ($cont2 >= $tam_campo)
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
}

?>
