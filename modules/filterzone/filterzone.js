$( function() {
    var memory_code = [16, 32, 64, 128];
    var screen_code = ["Moyenne", "Grand", "Très Grand"];
    var resolution_code = ["HD", "Full HD", "2K", "4K"];
  $( "#slider-price" ).slider({
    range: "min",
    min: 90,
    max: 550,
    value: 550,
    slide: function( event, ui ) {
      $( "#price" ).val( "Prix max : " + ui.value + " €"  );
    }
  });
  $( "#slider-memory" ).slider({
      range: "max",
      min: 0,
      max: 3,
      value: 0,
      slide: function( event, ui ) {
        $( "#memory" ).val( memory_code[ui.value] + " Go minimum"  );
      }
  });
  $( "#slider-resolution" ).slider({
      range: "max",
      min: 0,
      max: 3,
      value: 0,
      slide: function( event, ui ) {
        $( "#resolution" ).val( "Au moins "+resolution_code[ui.value]  );
      }
  });
  $( "#slider-screen" ).slider({
      range: true,
      min: 4.5,
      max: 7,
      values: [4.5, 7],
      step: 0.1,
      slide: function( event, ui ) {
        $( "#screen" ).val( "Entre " + ui.values[0] + "\" et " + ui.values[1] + "\"");
      }
  });
    $( "#price" ).val( "Prix max : " + $( "#slider-price" ).slider( "value") +
    "€" );
    $( "#memory" ).val( " 16 Go minimun" );
    $( "#screen" ).val( "Toutes les tailles" );
    $( "#resolution" ).val( "Au moins HD" );
} );
