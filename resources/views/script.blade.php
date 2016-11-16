<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-checkbox/1.4.0/bootstrap-checkbox.min.js"></script>
<script src="//cdn.bootcss.com/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="//cdn.bootcss.com/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script>
<script type="text/javascript">
    var notify = function(text, type) {
        $.notify({
            icon: 'fa fa-info-circle',
            message: text,
        },{
            placement: {
                from: 'top'
            },
            type: type
        });
    };
    $(document).ready(function() {
        $(".selectpicker").selectpicker();
        $(".checkboxpicker").checkboxpicker();
        @if($errors->any())
        @foreach($errors->get('notify.*') as $errortype => $error)
        notify('{{explode('|', $error[0])[1]}}', '{{explode('.', $errortype)[1]}}');
        @endforeach
        @foreach($errors->toArray() as $errortype => $error)
        @if(!strstr($errortype, "notify."))
        notify('{{$error[0]}}', 'danger');
        @endif
        @endforeach
        @endif
        @yield("ready")
    });
</script>