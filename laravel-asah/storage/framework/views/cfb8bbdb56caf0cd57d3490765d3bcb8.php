

<?php $__env->startSection('title', 'Tambah Mahasiswa Baru'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Formulir Mahasiswa Baru</h1>

    <?php if($errors->any()): ?>
        <div class="alert-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('mahasiswa.store')); ?>" novalidate>
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" id="nama" name="nama" value="<?php echo e(old('nama')); ?>" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo e(old('nim')); ?>" required>
        </div>

        <div class="form-group">
            <label for="prodi_id">Program Studi:</label>
            <!-- <input type="text" id="prodi_id" name="prodi_id" value="<?php echo e(old('prodi_id')); ?>" required> -->
            <select id="prodi_id" name="prodi_id" required>
                <option value="" disabled selected>-- Pilih Program Studi --</option>
                <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e(old('prodi_id') == $item->id ? 'selected' : ''); ?>>
                        <?php echo e($item->nama); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan Data</button>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-asah\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>