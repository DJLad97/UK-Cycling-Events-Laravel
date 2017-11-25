// RENAME THIS TO ajax.js

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        dataType: 'json',
        method: 'GET',
        url: '/getCart',
        success: function(data){
            var cart = data;
            $('.dropdown-menu').empty();
            $.each(data, function(){
                var nameKey = Object.keys(this)[1];
                var idKey = Object.keys(this)[0];
                var name = this[nameKey];
                var id = this[idKey];
                $('.dropdown-menu').append('<li>' + name + '</li><input type="button" onclick="removeItem(' + id + ')" class="btn btn-danger" name="removeItem" id="removeItem" value="Remove">')
            });
        }
    });
    
    $('#searchTerm').on('input', function(){
        var searchKeyword = $('#searchTerm').val();
        if(searchKeyword.length >= 1) {
            $.ajax({
                dataType: 'json',
                method: 'POST',
                url: '/raceSearch',
                data: {'searchTerm': searchKeyword},
                success: function(data){
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
    });
    
});