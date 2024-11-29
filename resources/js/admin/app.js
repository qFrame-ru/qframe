import { Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm';
import * as bootstrap from 'bootstrap';

import upload from './upload.js'
Alpine.data('upload', upload);

import sort from '@alpinejs/sort';
Alpine.plugin(sort);

Livewire.start();
