
<script src="https://code.jquery.com/jquery-1.8.3.min.js"
        integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8="
        crossorigin="anonymous"></script>

<script id="myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>

<script>
    var accessToken = '';
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // const token = "{!! route('token') !!}";

        $.ajax({
            url: "{!! route('token') !!}",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                console.log('got data from token  ..');
                console.log(JSON.stringify(data));

                accessToken=data;
            },
            error: function(data){
                console.log(data);

            }
        });
        var paymentConfig={
            createCheckoutURL:"{!! route('createPayment') !!}",
            executeCheckoutURL:"{!! route('executePayment') !!}",
        };

        var paymentRequest;
        paymentRequest = { amount: $('.amount').text(), intent:'sale',  invoice: $('.invoice').text()};
        console.log(JSON.stringify(paymentRequest));

        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: paymentRequest,
            createRequest: function(request){
                console.log('=> createRequest (request) :: ');
                console.log(request);
                var url= paymentConfig.createCheckoutURL+"?amount=" + paymentRequest.amount + "&invoice=" + paymentRequest.invoice;
                console.log(url);
                $.ajax({
                    url: url,
                    data:{
                        tknAjx: accessToken
                    },
                    type:'GET',
                    contentType: 'application/json',
                    success: function(data) {
                        console.log('got data from create  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));

                        var obj = JSON.parse(data);

                        if(data && obj.paymentID != null){
                            paymentID = obj.paymentID;
                            bKash.create().onSuccess(obj);
                            console.log('suc='+data);
                        }
                        else {
                            console.log('error');
                            bKash.create().onError();
                        }
                    },
                    error: function(data){
                        console.log('error='+data);
                        bKash.create().onError();
                    }
                });
            },

            executeRequestOnAuthorization: function(){
                console.log('data test 1');
                console.log('=> executeRequestOnAuthorization');
                var exurl = paymentConfig.executeCheckoutURL+"?paymentID="+paymentID;
                console.log(exurl);
                $.ajax({
                    url: exurl,
                    data:{
                        tknAjx: accessToken
                    },
                    type: 'GET',
                    contentType:'application/json',
                    success: function(data){
                        console.log('got data from execute  ..');
                        console.log('data ::=>');
                        console.log('data test 2');
                        console.log(JSON.stringify(data));
                        console.log('data test 3');
                        data = JSON.parse(data);
                        console.log(data);
                        console.log(data.paymentID);
                        if(data && data.paymentID != null){
                            alert('[SUCCESS] data : ' + JSON.stringify(data));
                            window.location.href = "{!! url('/') !!}";
                            console.log('data test 4');
                        }
                        else {
                            bKash.execute().onError();
                            console.log('data test 5');
                        }
                    },
                    error: function(){
                        bKash.execute().onError();
                    }
                });
            }
        });

        console.log("Right after init ");


    });
    function callReconfigure(val){
        bKash.reconfigure(val);
    }

    function clickPayButton(){
        $("#bKash_button").trigger('click');
    }
</script>
