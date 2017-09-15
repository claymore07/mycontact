
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $(function () {
        $("#autocomplete").autocomplete({
            source: "{{route('contacts.autoComplete')}}",
            minLength: 1,
            select: function (event, ui) {
                $(this).val(ui.item.value);
            },
            html: true,
            // optional (if other layers overlap autocomplete list)
            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000).css("top", 50);
            }
        });
    });
</script>
@yield('footer')
</body>
</html>