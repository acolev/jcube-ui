// just a test
export default {
    input: [
        'vendor/jcube/ui/src/resources/scss/bootstrap.scss',
        'vendor/jcube/ui/src/resources/scss/icons.scss',
        'vendor/jcube/ui/src/resources/scss/app.scss',

        'vendor/jcube/ui/src/resources/js/ui.js',
        'vendor/jcube/ui/src/resources/js/plugins/lord-icon-2.1.0.js',
    ],
    build: {
        rollupOptions: {
            output: {
                // Функция для генерации имени файла с путем относительно корня проекта
                // entryFileNames: (chunkInfo) => {
                //     // Получение пути к исходному файлу
                //     const filePath = chunkInfo.facadeModuleId ? chunkInfo.facadeModuleId.split('?')[0] : '';
                //     // Преобразование абсолютного пути в относительный
                //     const relativePath = path.relative(path.resolve(__dirname), filePath);
                //     // Замена разделителей пути и добавление префикса к имени файла
                //     return `assets/${relativePath.replace(/\\/g, '/')}`;
                // },
                entryFileNames: 'assets/js/entry/[name]-[hash].js',
                chunkFileNames: 'assets/js/[name]-[hash].js',
                assetFileNames: 'assets/[ext]/[name]-[hash].[ext]',
            },
        },
    }
}
