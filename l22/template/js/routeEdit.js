$(document).ready(function(){

  var forwardDirection = "<tr>" + $("#stationsDirect").html() + "</tr>";

  $("#addStation1").click(function(e){
    e.preventDefault();
    $("#forwardDirection").append(forwardDirection);
    update_count_number_forwardDirection(true);
    addActionDeleteStation();
    $( "#forwardDirection select:last-child" ).combobox();
  });

  $( "#forwardDirection select" ).combobox();
  addActionDeleteStation();

  var back = "<tr>" + $("#stationRevers").html() + "</tr>";
  $("#addStation2").click(function(e){
    e.preventDefault();
    $("#backDirection").append(back);
    addActionDeleteStation();
    update_count_number_backDirection(true);
    addActionDeleteStation();
    $( "#backDirection select:last-child" ).combobox();
  });

  $( "#backDirection select" ).combobox();
  addActionDeleteStation();

  //Функція одна і таж навіщо подвоювати код?
  $("#calculateTime1, #calculateTime2").click(function(e){
    e.preventDefault();
    var count_start_station = 0;
    var id = $(this).attr("data-table-id");

    //Запам'ятовую колекцію селектів вона нам зе пригодиться. Пошук колекції часно одна з самих ресурсоємних задач
    var select = $("#"+id+" select");
    select.each( function( index, element ){
      //Визначаєм чи це реальна зупинка
      var is_real = $(this).children("option:checked").attr("data-is-real");
      if(is_real==1)
        count_start_station++;
    });

    var isTime = true;
    var time;
    do{
      time = prompt('Введіть час в ХВИЛИНАХ за який проходить транспорт весь маршрут, ми розрахуємо приблизний час за Вас :)', '');
      if(time == NaN) isTime = false;
      else if (time.replace (/\d/g, '').length) alert ('Ви ввели не тільки цифри, введіть будь ласка додатнє ціле число');
      else if (time == 0) alert ('Введіть число більше за нуль');
      else if (time == '') alert ('Але Ви нічого не ввели');
      else if (time == null) alert ('Але Ви нічого не ввели');
      else {
        isTime = false;

        var timeToWay = time * 60 / count_start_station;
        var currentTime = 0;
        var countCrosRoute = 0;
        //Переробив перебор відносно селекта щоб можна було визначати
        select.each( function( index, element ){
          var is_real = $(this).children("option:checked").attr("data-is-real");
          if(is_real==1){
            $(this).parent().parent().find(".delta-time").val(parseInt(currentTime));
            currentTime+=timeToWay
          }else{
            $(this).parent().parent().find(".delta-time").val(-1);
            countCrosRoute++;
          }

        });
        if(countCrosRoute!=0){
          alert("На реальних зупинках час розраховано! Розставте час на " + countCrosRoute + " перехрестях! Середній час між зупинками рівний " + timeToWay + " c" );
        }
      }
    } while(isTime);
  });

});

function addActionDeleteStation() {
  $(".deleteStation").unbind("click").click(function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
    update_count_number_forwardDirection(false);
    update_count_number_backDirection(false);
  })
}

function update_count_number_forwardDirection(add){

  var item_forwardDirection = 0;
  var count_forwardDirection = 0;
  var count_select_name_start = 1;
  var count_input_time_start = 1;
  
  $("#forwardDirection").find("tr").each( function( index, element ){
  }).find("td").each( function( index, element ){
    if(item_forwardDirection == index){
      count_forwardDirection++;
      $(this).text(count_forwardDirection);
      item_forwardDirection += 4;
    }
  }).find("select").each( function( index, element ){
    element.setAttribute("name", "id_stations_start_" + count_select_name_start);
    count_select_name_start++;
  });
  
  $("#forwardDirection").find(".delta-time").each( function( index, element ){
    element.setAttribute("name", "delta_time_start_" + count_input_time_start);
    count_input_time_start++;
    if(add && count_forwardDirection == index + 1){
      element.setAttribute("value", "");
    }
  });
}

function update_count_number_backDirection(add){

  var item_backDirection = 0;
  var count_backDirection = 0;
  var count_select_name_end = 1;
  var count_input_time_end = 1;

  $("#backDirection").find("tr").each( function( index, element ){
  }).find("td").each( function( index, element ){
    if(item_backDirection == index){
      count_backDirection++;
      $(this).text(count_backDirection);
      item_backDirection += 4;
    }
  }).find("select").each( function( index, element ){
    element.setAttribute("name", "id_stations_end_" + count_select_name_end);
    count_select_name_end++;
  });

  $("#backDirection").find(".delta-time").each( function( index, element ){
    element.setAttribute("name", "delta_time_end_" + count_input_time_end);
    count_input_time_end++;
    if(add && count_backDirection == index + 1){
      element.setAttribute("value", "");
    }
  });
}

$.widget( "custom.combobox", {
  _create: function() {
    this.wrapper = $( "<span>" )
    .addClass( "custom-combobox" )
    .insertAfter( this.element );

    this.element.hide();
    this._createAutocomplete();
    this._createShowAllButton();
  },

  _createAutocomplete: function() {
    var selected = this.element.children( ":selected" ),
    value = selected.val() ? selected.text() : "";

    this.input = $( "<input>" )
    .appendTo( this.wrapper )
    .val( value )
    .attr( "title", "" )
    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
    .autocomplete({
      delay: 0,
      minLength: 0,
      source: $.proxy( this, "_source" )
    })
    .tooltip({
      classes: {
        "ui-tooltip": "ui-state-highlight"
      }
    });

    this._on( this.input, {
      autocompleteselect: function( event, ui ) {
        ui.item.option.selected = true;
        this._trigger( "select", event, {
          item: ui.item.option
        });
      },

      autocompletechange: "_removeIfInvalid"
    });
  },

  _createShowAllButton: function() {
    var input = this.input,
    wasOpen = false;

    $( "<a>" )
    .attr( "tabIndex", -1 )
    .attr( "title", "Show All Items" )
    .tooltip()
    .appendTo( this.wrapper )
    .button({
      icons: {
        primary: "ui-icon-triangle-1-s"
      },
      text: false
    })
    .removeClass( "ui-corner-all" )
    .addClass( "custom-combobox-toggle ui-corner-right" )
    .on( "mousedown", function() {
      wasOpen = input.autocomplete( "widget" ).is( ":visible" );
    })
    .on( "click", function() {
      input.trigger( "focus" );

            // Close if already visible
            if ( wasOpen ) {
              return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
  },

  _source: function( request, response ) {
    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
    response( this.element.children( "option" ).map(function() {
      var text = $( this ).text();
      if ( this.value && ( !request.term || matcher.test(text) ) )
        return {
          label: text,
          value: text,
          option: this
        };
      }) );
  },

  _removeIfInvalid: function( event, ui ) {

        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }

        // Search for a match (case-insensitive)
        var value = this.input.val(),
        valueLowerCase = value.toLowerCase(),
        valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });

        // Found a match, nothing to do
        if ( valid ) {
          return;
        }

        // Remove invalid value
        this.input
        .val( "" )
        .attr( "title", value + " didn't match any item" )
        .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },

      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });