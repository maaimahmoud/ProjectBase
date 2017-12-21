@extends('include.navbar')

@section('title')
    ProjectBase
@endsection


@section('content')

<div class="container">
  <h2>Form control: checkbox</h2>
  <p>The form below contains three checkboxes. The last option is disabled:</p>
  <form>
    <div class="checkbox">
      <label><input type="checkbox" value="">Option 1</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Option 2</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="" disabled>Option 3</label>
    </div>
  </form>
</div>


@endsection