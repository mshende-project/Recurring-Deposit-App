$(document).ready(function () {
    
    $('#import').validate({
        rules: {
            file: {
                required: true
            } 
        }
    });

    $('#add-user').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            address: {
                required: true
            },
            rd_acc_no: {
                required: true
            },
            as_card_no: {
                required: true
            },
            dop: {
                required: true
            },
            dom: {
                required: true
            },
            rupees: {
                required: true
            },
            remark_kyc: {
                required: true
            },
            pan_card: {
                required: '#pan_card:checked'
            },
            adhar_card: {
                required: '#adhar_card:checked'
            },
            election_card: {
                required: '#election_card:checked'
            },
            user_id: {
                required: '#link_account_check:checked'
            }
        }
    });

    $('#daily-collection').validate({
        rules: {
            user_id: {
                required: true
            },
            rupees: {
                required: true
            }
        }
    });
});