<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-checkbox/1.4.0/bootstrap-checkbox.min.js"></script>
<script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
<script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.js"></script>
<script src="//cdn.bootcss.com/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".selectpicker").selectpicker();
        $(".checkboxpicker").checkboxpicker();
        PNotify.prototype.options.styling = "bootstrap3";
        @if($errors->any())
                @foreach($errors->get('notify.*') as $errortype => $error)
                new PNotify({
            title: '{{explode('|', $error[0])[0]}}',
            text: '{{explode('|', $error[0])[1]}}',
            type: '{{explode('.', $errortype)[1]}}',
            buttons: {
                sticker: false,
            }
        });
        @endforeach
                @foreach($errors->toArray() as $errortype => $error)
                @if(!strstr($errortype, "notify."))
                new PNotify({
            title: 'Input error',
            text: '{{$error[0]}}',
            type: 'error',
            buttons: {
                sticker: false,
            }
        });
        @endif
        @endforeach
        @endif
        @yield("ready")
    });
</script>