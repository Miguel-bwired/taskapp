<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Delete task<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Delete task</h1>

<p>Are you suer?</p>
    <?= form_open("/tasks/delete/". $task->id) ?>
            <button>Yes</button>
            <a href="<?= site_url("/tasks") ?>">Cancel</a>
    </form>
<?= $this->endSection() ?>
