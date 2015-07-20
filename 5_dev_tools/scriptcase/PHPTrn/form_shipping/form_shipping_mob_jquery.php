
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
  scEventControl_data["description" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fixedshiprate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fixedweightrate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rates" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["description" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fixedshiprate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fixedshiprate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fixedweightrate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fixedweightrate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rates" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rates" + iSeqRow]["change"]) {
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
  $('#id_sc_field_description' + iSeqRow).bind('blur', function() { sc_form_shipping_description_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_shipping_description_onfocus(this, iSeqRow) });
  $('#id_sc_field_fixedshiprate' + iSeqRow).bind('blur', function() { sc_form_shipping_fixedshiprate_onblur(this, iSeqRow) })
                                           .bind('click', function() { sc_form_shipping_fixedshiprate_onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_shipping_fixedshiprate_onfocus(this, iSeqRow) });
  $('#id_sc_field_fixedweightrate' + iSeqRow).bind('blur', function() { sc_form_shipping_fixedweightrate_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_shipping_fixedweightrate_onfocus(this, iSeqRow) });
  $('#id_sc_field_rates' + iSeqRow).bind('blur', function() { sc_form_shipping_rates_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_shipping_rates_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_shipping_description_onblur(oThis, iSeqRow) {
  do_ajax_form_shipping_mob_validate_description();
  scCssBlur(oThis);
}

function sc_form_shipping_description_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shipping_fixedshiprate_onblur(oThis, iSeqRow) {
  do_ajax_form_shipping_mob_validate_fixedshiprate();
  scCssBlur(oThis);
}

function sc_form_shipping_fixedshiprate_onclick(oThis, iSeqRow) {
  do_ajax_form_shipping_mob_event_fixedshiprate_onclick();
}

function sc_form_shipping_fixedshiprate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shipping_fixedweightrate_onblur(oThis, iSeqRow) {
  do_ajax_form_shipping_mob_validate_fixedweightrate();
  scCssBlur(oThis);
}

function sc_form_shipping_fixedweightrate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shipping_rates_onblur(oThis, iSeqRow) {
  do_ajax_form_shipping_mob_validate_rates();
  scCssBlur(oThis);
}

function sc_form_shipping_rates_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}