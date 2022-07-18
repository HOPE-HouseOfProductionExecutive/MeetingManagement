@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="Assets/css/user/shortcut/style.css">

<div class="shortcut_layer">
    <div class="shortcut_upper">
        <h3>Pencarian Data Rapat</h3>
    </div>
    <div class="shortcut_box">
        <form action="/tes" method="POST">
            @csrf
            <div class="shortcut_waktu">
                <p>Waktu Rapat</p>
                <details class="custom-select">
                    <summary class="radios">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="default"
                            title="Pilih Waktu Rapat" checked>
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item1"
                            title="Item 1">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item2"
                            title="Item 2">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item3"
                            title="Item 3">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item4"
                            title="Item 4">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item5"
                            title="Item 5">
                    </summary>
                    <input type="hidden" id="waktu" name="waktu" value="">
                    <ul class="list">
                        <li>
                            <label for="item1">
                                Item 1
                            </label>
                        </li>
                        <li>
                            <label for="item2">Item 2</label>
                        </li>
                        <li>
                            <label for="item3">Item 3</label>
                        </li>
                        <li>
                            <label for="item4">Item 4</label>
                        </li>
                        <li>
                            <label for="item5">Item 5</label>
                        </li>
                    </ul>
                </details>
            </div>
            <div class="shortcut_waktu">
                <p>Waktu Rapat</p>
                <details class="custom-select">
                    <summary class="radios">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="default"
                            title="Pilih Waktu Rapat" checked>
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items1"
                            title="Item 1">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items2"
                            title="Item 2">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items3"
                            title="Item 3">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items4"
                            title="Item 4">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items5"
                            title="Item 5">
                    </summary>
                    <input type="hidden" id="status" name="status" value="">
                    <ul class="list">
                        <li>
                            <label for="items1">
                                Item 1
                            </label>
                        </li>
                        <li>
                            <label for="items2">Item 2</label>
                        </li>
                        <li>
                            <label for="items3">Item 3</label>
                        </li>
                        <li>
                            <label for="items4">Item 4</label>
                        </li>
                        <li>
                            <label for="items5">Item 5</label>
                        </li>
                    </ul>
                </details>
            </div>
    </div>
    <div class="shortcut_mencari">
        <button type="submit">Mencari</button>
    </div>
    </form>
</div>

<div class="shortcut_hasil_layer">
    <div class="shortcut_judul">
        <p>Judul Rapat</p>
        <select name="status" id="status">
            <option value="data">No Data Found</option>
        </select>
    </div>
</div>
<script>
    function changeValueHidden(id, opt) {
        var testing = document.getElementById(id);
        if (opt.includes("waktu")) {
            var input = document.getElementById('waktu');
        } else {
            var input = document.getElementById('status');
        }
        input.value = testing.title;
    }

</script>
@endsection
