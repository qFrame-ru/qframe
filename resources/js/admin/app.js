import { Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm';
import sort from '@alpinejs/sort';

import upload from './upload.js'
Alpine.data('upload', upload);

Alpine.plugin(sort);
Livewire.start();
