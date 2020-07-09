<div class="ws-header">
    <form id="form_datepicker" method="post" class="dat-cas">
        @csrf

        <label for="from">From
            <input type="text" id="from" name="from" autocomplete="off">
        </label>
        <label for="to">to
            <input type="text" id="to" name="to" autocomplete="off">
        </label>

        <button type="submit" class="btn btn-outline-secondary search">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
