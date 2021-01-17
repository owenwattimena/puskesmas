</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
    $('#dataTable').DataTable();
    $('#jenis_pasien').select(function() {
        console.log(this.value)
    });
});
</script>
</body>

</html>