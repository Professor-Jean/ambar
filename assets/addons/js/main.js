$(function() {
  $(".maskhora").mask("99:99:99");
});

function findInfo(){ //registro equipamento cliente
  $.ajax({
    url:   baseUrl + "Client_Equipment/findSugestion",
    method: "POST",
    data: {id: $("#sel_equip").val()},
  }).done(function(sugestion) {
    $("#sugestion_area").html(sugestion);
  });
}

function shared(auto){ //registro equipamento cliente //auto serve para verificar se está carregando automaticamente ou por um evento 1=auto 0=evento.
  $.ajax({
    url:   baseUrl + "Client_Equipment/shared",
    method: "POST",
    data: {id: $("#sel_equip").val()},
  }).done(function(shared) {
    if(shared==0){
      $("#inputShared").hide();
      $("#inputShared").val("1");
    }else{
      $("#inputShared").show();
      if(auto==0) $("#inputShared").val("");
    }
  });
}
