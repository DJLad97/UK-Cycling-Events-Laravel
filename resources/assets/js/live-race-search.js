// RENAME THIS TO ajax.js

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $('#raceSearch').submit(function(e){
        // e.preventDefault();

    function removeItem(){
        console.log('removeItem called')
    }
    $('#searchTerm').on('input', function(){
        var searchKeyword = $('#searchTerm').val();
        if(searchKeyword.length >= 1) {
            $.ajax({
                dataType: 'json',
                method: 'POST',
                url: '/raceSearch',
                data: {'searchTerm': searchKeyword},
                success: function(data){
                    console.log(data);
                    $('ul#content').empty();
                    
                    $.each(data, function(){
                        $('ul#content').append('<li><a href="/races/' + this.raceID + '">' + this.raceName + '</a></li>');
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
        else if(searchKeyword.length <= 0) {
            $('ul#content').empty();
        }

        if(searchKeyword.length >= 1) {
            $('#initial-results').hide();
        }
        else {
            $('#initial-results').show();
            
        }
        // $.post(
        //     '/raceSearch',
        //     {searchTerm: searchKeyword},
        //     function(data){
        //         $.each(data, function(){
        //             console.log(data);
  
        //         // $('ul#content').append('<div class="race-listing"><li style="white-space:nowrap"><strong><a class="non-nav" href="race-sign-up.php?RaceID=' +
        //         //                       this.RaceID + '">' + this.RaceName + '</a>' + previewHTML + '</strong></li></div>');
  
        //         $('ul#content').append('<li>' + data.raceID + ' ' + data.raceName + '</li>');
  
        //         // $('ul#content').append('<li><a href="race-sign-up.php?RaceID=' +
        //         //                       this.raceID + '">' + this.RaceName + '</a>' +
        //         //                       '<div class="preview"><a href="#" data-id=' +
        //         //                       this.RaceID + ' class="getPreview">Preview</a></div></li>');
        //       })
        //     }, "json");
    });
    // var preivewHTML = '';
    // $('#searchTerm').on('input', function(){
    //     var searchKeyword = $(this).val();

    //     if(searchKeyword.length >= 1){
    //         $.post(
    //             '/raceSearch',
    //             {searchTerm: searchKeyword},
    //             function(data){
    //                 console.log(data);
    //             }, "json");
    //     }
    // });
    // $.ajaxSetup({
    //     headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $.post(
    //     '/raceSearch',
    //     function(){
    //         console.log('response');
    // });
    
});