function noty_alert( type, msg, time = 2000) {
  new Noty({
      theme: 'bootstrap-v4',
      type: type,
      layout: 'topRight',
      text: msg,
      timeout: (true, time)
  }).show();
}

function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = hoy.getDate(),
        m = hoy.getMonth()+1, 
        y = hoy.getFullYear(),
        data;

    if(d < 10) { d = "0"+d }

    if(m < 10) { m = "0"+m }

    data = y+"-"+m+"-"+d;
    _dat.value = data;
}

function clean_form(form_id) {
  $(`#${form_id} .form-control`).removeClass('error')
  $(`#${form_id} .error`).empty()
  $(`#${form_id}`)[0].reset()
}