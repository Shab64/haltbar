<form method="POST" action="{{ url('uploadRalawise') }}" enctype="multipart/form-data">
    @csrf
    <input name="csv_file" type="file" accept=".csv"/>
    <button>Submit</button>
</form>
