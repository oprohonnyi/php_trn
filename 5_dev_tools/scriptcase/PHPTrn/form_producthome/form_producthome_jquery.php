
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && 0 < $("#id_ac_" + sField).length) {
    scSetFocusOnField($("#id_ac_" + sField));
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["picture" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["list_order" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["description" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["list_order" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["list_order" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_picture' + iSeqRow).bind('blur', function() { sc_form_producthome_picture_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_producthome_picture_onfocus(this, iSeqRow) });
  $('#id_sc_field_list_order' + iSeqRow).bind('blur', function() { sc_form_producthome_list_order_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_producthome_list_order_onfocus(this, iSeqRow) });
  $('#id_sc_field_description' + iSeqRow).bind('blur', function() { sc_form_producthome_description_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_producthome_description_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_producthome_picture_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_producthome_picture_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_producthome_list_order_onblur(oThis, iSeqRow) {
  do_ajax_form_producthome_validate_list_order();
  scCssBlur(oThis);
}

function sc_form_producthome_list_order_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producthome_description_onblur(oThis, iSeqRow) {
  do_ajax_form_producthome_validate_description();
  scCssBlur(oThis);
}

function sc_form_producthome_description_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_picture" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_producthome_ul_save.php",
    dropZone: $("#hidden_field_data_picture" + iSeqRow),
    formData: function() {
      return [
        {name: 'app_dir', value: '<?php echo $this->Ini->path_aplicacao; ?>'},
        {name: 'app_name', value: 'form_producthome'},
        {name: 'upload_dir', value: '<?php echo $this->Ini->root . $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_type', value: 'single'},
        {name: 'param_name', value: 'picture' + iSeqRow},
        {name: 'upload_file_height', value: '0'},
        {name: 'upload_file_width', value: '0'},
        {name: 'upload_file_aspect', value: 'S'},
        {name: 'upload_file_type', value: 'I'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_picture" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_picture" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, thumbDisplay, checkDisplay, var_ajax_img_thumb;
      if (data.result[0].body) {
        fileData = $.parseJSON(data.result[0].body.innerText);
      }
      else {
        fileData = eval(data.result);
      }
      $("#id_sc_field_picture" + iSeqRow).val("");
      $("#id_sc_field_picture_ul_name" + iSeqRow).val(fileData[0].sc_random_prot);
      $("#id_sc_field_picture_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_picture = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_random_prot;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_picture) ? "none" : "";
      $("#id_ajax_img_picture" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_picture" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_thumb;
        document.F1.temp_out1_picture.value = var_ajax_img_picture;
      }
      else if (document.F1.temp_out_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_picture;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_picture" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      $("#txt_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_picture" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_picture" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_picture" + iSeqRow).hide();
      }
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

