<div class="footer">
    <div class="pull-right">
        Total Pacientes: {{ count(\App\patient::where('visible','=',true)->get()) }}
    </div>
    <div>
        <strong>Copyright</strong> Zangles
    </div>
</div>