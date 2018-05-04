<div id="footer">
    <span class="glyphicon">MNNIT Allahabad</span><br/>
    <span class="glyphicon">&copy; 2017-2018</span>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="css/Bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#loginpopup').click(function () {
            $('#modal1').css('margin','auto')
            			.modal('show');
        });

		$('#loginpopup').click(function () {
            $('#dialog-model')
            			.css('width','320');
        });
       
        $('#btnclose').click(function () {
            $('#modal1').modal('hide');
        });

        $('#btncross').click(function () {
            $('#modal1').modal('hide');
        });

        /* reset password modal popup code */
        $('#btn-resetpwd').click(function () {
            $('#modal2')
                        .modal('show');
        });
        $('#btn-resetpwd').click(function () {
            $('#dialog-model-pwd').css('margin','auto')
                                    .css('width','500');
        });

        $('#btncross-resetpwd').click(function () {
            $('#modal2').modal('hide');
        });

    });

</script>
<style type="text/css" rel="stylesheet" >
    #footer{
        margin-top: 10px;
        width: 100%;
        height: 50px;
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 5px;
        clear: both;
    }
</style> 
 </body>
</html>