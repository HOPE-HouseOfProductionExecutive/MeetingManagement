@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<style>




.select {
  position: relative;
  min-width: 200px;
}
.select svg {
  position: absolute;
  right: 12px;
  top: calc(50% - 3px);
  width: 10px;
  height: 6px;
  stroke-width: 2px;
  stroke: #9098a9;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  pointer-events: none;
}
.select select {
  -webkit-appearance: none;
  padding: 7px 40px 7px 12px;
  width: 100%;
  border: 1px solid #e8eaed;
  border-radius: 5px;
  background: #fff;
  box-shadow: 0 1px 3px -2px #9098a9;
  cursor: pointer;
  font-family: inherit;
  font-size: 16px;
  transition: all 150ms ease;
}
.select select:required:invalid {
  color: #5a667f;
}
.select select option {
  color: #223254;
}
.select select option[value=""][disabled] {
  display: none;
}
.select select:focus {
  outline: none;
  border-color: #07f;
  box-shadow: 0 0 0 2px rgba(0,119,255,0.2);
}
.select select:hover + svg {
  stroke: #07f;
}
.sprites {
  position: absolute;
  width: 0;
  height: 0;
  pointer-events: none;
  user-select: none;
}


</style>

<label class="select" for="slct">
    <select id="slct" required="required">
      <option value="" disabled="disabled" selected="selected">Select option</option>
      <option value="#">One</option>
      <option value="#">Two</option>
      <option value="#">Three</option>
      <option value="#">Four</option>
      <option value="#">Five</option>
      <option value="#">Six</option>
      <option value="#">Seven</option>
    </select>
    <svg>
      <use xlink:href="#select-arrow-down"></use>
    </svg>
  </label>
  <!-- SVG Sprites-->
  <svg class="sprites">
    <symbol id="select-arrow-down" viewbox="0 0 10 6">
      <polyline points="1 1 5 5 9 1"></polyline>
    </symbol>
  </svg>


@endsection