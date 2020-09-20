jQuery(document).ready(function($){

    $(".btn-user").click(function(event){
        event.preventDefault();
        var id = $(this).attr('data-user');

        $.ajax({
            type: 'GET',
            cache: true,
            url: 'https://jsonplaceholder.typicode.com/users/'+ id,
            success: function (data) {

                var html = '<div class="postbox user-details">' +
                    '<h2 class="heading-user-details"><strong>Details about ' + data.name +
                    '</strong></h2>' +
                    '<ul>' +
                    '<li><strong>ID:</strong> ' + data.id + '</li>' +
                    '<li><strong>Name:</strong> ' + data.name + '</li>' +
                    '<li><strong>Username:</strong> ' + data.username+ '</li>' +
                    '<li><strong>Email:</strong> ' + data.email + '</li>' +
                    '<li ><strong class="box-li">Address:</strong> ' +
                    '<ul class="include-ul">' +
                    '<li><strong>street:</strong> '+ data.address.street +'</li>' +
                    '<li><strong>suite:</strong> '+ data.address.suite +'</li>' +
                    '<li><strong>city:</strong> '+ data.address.city +'</li>' +
                    '<li><strong>zipcode:</strong> '+ data.address.zipcode +'</li>' +
                    '<li ><strong class="box-li">Geo:</strong>' +
                    '<ul class="include-ul">' +
                    '<li><strong>lat:</strong> '+ data.address.geo.lat +'</li>' +
                    '<li><strong>lng:</strong> '+ data.address.geo.lng +'</li>' +
                    '</ul>' +
                    '</li>' +
                    '</ul>' +
                    '</li>' +
                    '<li><strong>Pnone:</strong> ' + data.phone + '</li>' +
                    '<li><strong>Website:</strong> ' + data.website + '</li>' +
                    '<li ><strong class="box-li">Company:</strong>' +
                    '<ul class="include-ul">' +
                    '<li><strong>name:</strong> '+ data.company.name +'</li>' +
                    '<li><strong>catchPhrase:</strong> '+ data.company.catchPhrase +'</li>' +
                    '<li><strong>bs:</strong> '+ data.company.bs +'</li>' +
                    '</ul>' +
                    '</li>' +
                    '</ul>' +
                    '</div>';

                $('.json-user-details').html(html);

            }
        });

        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);

    });
});