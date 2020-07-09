require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

$( function() {
    var dateFormat = "yy/mm/dd",
        from = $( "#from" )
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: "yy-mm-dd"
            })
            .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( "dd/mm/yy", element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
} );

const client = document.getElementById('campaignRoster')
client.addEventListener('click',  (event) => {
    choiseIds(event, 'clientId', '/company')
});

const campaign = document.getElementById('campaignList')
campaign.addEventListener('click',  (event) => {
    choiseIds(event, 'campaignId', '/demographic')
});


function choiseIds(event, cookie, redirect) {
    let target = event.target; // где был клик?
    document.cookie = `${cookie}=${event.target.id}`
    for(let i = 0; i < client.children.length; i++) {
        client.children[i].classList.remove('activated')
    }

    target.classList.add('activated')

    window.location.href = redirect;
}
