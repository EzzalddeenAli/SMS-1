
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('AdminLTE/AdminLTE.min.js') }}"></script>
@if(isset($vue_rating))
    <script src="{{asset('js/vue/heart-rating.js')}}"></script>
    <script src="{{asset('js/vue/rating.vue.js')}}"></script>
@endif

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>