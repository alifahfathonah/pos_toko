var $base_url = $('body').data('baseurl');

$(function() {
  $('#input_content').on('keydown', '.number_only', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

  var number_only = $('.number_only').val();
  var elem_id = '#'+$('.number_only').attr('id');
  $(elem_id).val(toRp(number_only));
});

function confirm_delete(id, url){
  var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = url+id;
  }
}


function number_currency(elem){
	var elem_id = '#'+elem.id;
	var elem_val		= $(elem_id).val();
	var elem_no_cur = elem_id.replace(/_currency/g,'');

	var str = elem_val.toString(), parts = false, output = [], i = 1, formatted = null;

	parts = str.split(".");
	var gabung = '';
	for (var i = 0; i < parts.length; i++) {
		var gabung = gabung+parts[i];
	}

	str = gabung.split("").reverse();
	var i = 1;
	for(var j = 0, len = gabung.length; j < len; j++) {
		if(str[j] != ".") {
			output.push(str[j]);
			if(i%3 == 0 && j < (len - 1)) {
				output.push(".");
			}
			i++;
		}
	}

	formatted = output.reverse().join("");
	$(elem_id).val(formatted);
	$(elem_no_cur).val(gabung);
}

function nilai_currency(elem){
	var elem_id = elem.id;
	var elem = '#'+elem.id;
	var elem_val_curr = $(elem).val();
	var elem_val_curr_no_rupiah = remove_rupiah(elem_val_curr);
	var elem_val_curr_no_currency = elem_val_curr_no_rupiah.toString().replace(/[^0-9\.]+/g, "");

	var elem_str = elem_id.toString();
	var elem_no_cur = elem_str.replace(/_currency/g,'');

	var elem_val_currency = format_rupiah(elem_val_curr);
	$(elem).val(elem_val_currency);
	$('#'+elem_no_cur).val(elem_val_curr_no_currency);
}

function pembulatan(num){
  var num_str = num.toString();
  var tiga_akhir = num_str.substr(num_str.length - 2);
  if (tiga_akhir !== '00') {
    var pembulatan = 100 - parseInt(tiga_akhir);
    num_str = parseInt(num_str) + parseInt(pembulatan);
  }
  return num_str;
}

function remove_currency(num){
  var str = num.toString().replace(/[^0-9\.]+/g, "");
  return str;
}

function remove_rupiah(num){
  var str = num.toString().replace("Rp. ", "");
  return str;
}


var format_rupiah = function(num){
    var str = num.toString().replace("Rp. ", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }

    formatted = output.reverse().join("");
      return("Rp. " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};


function confirm_payment(id,control){
	var a = confirm("Anda yakin ingin membayar pembelian ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_onprogress(id,control){
	var a = confirm("Anda yakin ingin memproses data ini?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_done(id,control){

	var a = confirm("Apakah sudah terkonfirmasi ?");
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_transaction(id,control,nopol){
	var a = confirm("Anda yakin ingin mengkonfirmasi kedatangan truck dengan nopol "+nopol);
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_act(id,control){
	var a = confirm("Anda yakin ingin mengaktifkan data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_approved(id,control){
	var a = confirm("Anda yakin ingin approve data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_not_approved(id,control){
	var a = confirm("Anda yakin ingin reject data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}


function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}

function selectList_global(idElemen, url, placeholder, id = null){
    // $('#i_gudang').select2('destroy');
    $(idElemen).css('width', '100%');
    $(idElemen).select2({
      placeholder: placeholder,
      multiple: false,
      allowClear: true,
      ajax: {
        url: $base_url+url,
        dataType: 'json',
        delay: 100,
        cache: false,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page,
            id  : id
          };
        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
          // console.log(data.items);
        }
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: FormatResult,
      templateSelection: FormatSelection,
    });
  }

  function selectList_globalmulti(idElemen, url, placeholder, id = null){
      $(idElemen).css('width', '100%');
      $(idElemen).select2({
        placeholder : placeholder,
        multiple    : true,
        allowClear  : true,
        ajax: {
          url: $base_url+url,
          dataType: 'json',
          delay: 100,
          cache: false,
          data: function (params) {
            return {
              q   : params.term, // search term
              page: params.page,
              id  : id
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data.items,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          }
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: FormatResult,
        templateSelection: FormatSelection,
      });
    }


    function selectlist_global2(idElemen, url, placeholder, id = null, array = null){
        $.ajax({
        type      : "POST",
        url       : $("body").data("baseurl")+url,
        data      : array,
        dataType  : "json",
        cache     : false,
        success   : function(data){
          $(idElemen).empty();
          $(idElemen).select2('destroy');
          $(idElemen).append('<option value="0">  </option>');
          for (var i = 0; i < data.length; i++) {
            var selected = "";
            if (data[i].data_id == id) {
              selected = 'selected';
            }
            $(idElemen).append('\
              <option value="'+data[i].data_id+'" '+selected+'>'+data[i].data_name+'</option>\
            ');
          }
          $(idElemen).select2({
            placeholder : placeholder
          });
        },
        error     : function(data){
          alert('error');
        }
      });
    }

function getData(form, url){
  var result = null;
  // var storage1 = JSON.parse(localStorage.getItem('storage1'));
  $.ajax({
    type : 'POST',
    url  : $base_url+url,
    data : $(form).serialize(),
    dataType : "json",
    success:function(data){
      getResult(data);
    }
  });
  // return result;
}

function postData2(array, url){
  var $base_url = $('body').data('baseurl');
  var result = null;
  $.ajax({
    type : 'POST',
    url  : $base_url+url,
    data : array,
    dataType : "json",
    success:function(data){
        // getResult(data)
        return data;
    }
  });
}

function getModalglobal(array = null, url = null, elem) {
    var $base_url = $('body').data('baseurl');
    $.ajax({
      type      : 'get',
      url       : $base_url+url,
      dataType  : "html",
      success:function(data){
        $(elem).modal({
              keyboard: false,
              backdrop: 'static'
            });
        $(elem+" .modal-content").html();
        $(elem+" .modal-content").html(data);
        $(elem).modal('show');

        actionModalglobal('#'+$(elem).find('form').attr('id'), elem);

        functionform(array);
      }
    });
}

function actionModalglobal(formName, modalname)
{
    $(formName).submit(function(event){
      var modal_name = "#"+$(formName).parent().parent().parent().attr('id');
      $.ajax({
        type      : 'POST',
        url       : $('body').data('baseurl')+document.getElementById('i_action').value,
        data      : $(formName).serialize(),
        cache     : false,
        dataType  : "json",
        success   : function(data){
        }, error  : function () {
          // $(modalname).modal('hidden');
        }
      });

      $(modal_name).modal('hide');
      event.preventDefault();
    });
}
