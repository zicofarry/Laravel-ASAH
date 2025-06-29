

<?php $__env->startSection('title', 'Daftar Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>
    <h1 style="margin-bottom: 10px;">👨‍🎓 Daftar Mahasiswa</h1>

    
    <?php if(session('success')): ?>
        <div class="alert-success">
            🎉 <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <p style="text-align: right;">
        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn-add">+ Tambah Mahasiswa</a>
    </p>

    
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($mahasiswa->nim); ?></td>
                    <td><?php echo e($mahasiswa->nama); ?></td>
                    <td><?php echo e($mahasiswa->prodi?->nama ?? '🤷 Prodi Ga Ketemu'); ?></td>
                    <td style="text-align: center;">
                        <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa->id)); ?>" class="btn-add" style="padding: 6px 10px; font-size: 14px; margin-right: 6px;">✏️ Edit</a>
                        <form action="<?php echo e(route('mahasiswa.destroy', $mahasiswa->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button onclick="return confirm('Yakin mau hapus data ini?')" class="btn-add" style="background-color: #DC2626; padding: 6px 10px; font-size: 14px; border: none;">
                                🗑 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #888; padding: 20px;">
                        😴 Belum ada data mahasiswa yang ditambahkan.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-asah\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>