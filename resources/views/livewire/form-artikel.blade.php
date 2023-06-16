<div>
    <form wire:submit.prevent='simpan'>
        <div class="form-group">
            <label>Judul</label>
            <input wire:model="judul" name="judul" id="" class="form-control" placeholder="Masukan judul">
        </div>

        <div class="form-group">
            <textarea wire:model="deskripsi"  name="" rows="5" class="form-control" placeholder="Masukan Deskripsi"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
