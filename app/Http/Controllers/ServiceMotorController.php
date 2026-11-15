<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Pembayaran;

class ServiceMotorController extends Controller
{
    private function config(string $module): array
    {
        $configs = [

            'pelanggan' => [
                'title' => 'Data Pelanggan',
                'model' => Pelanggan::class,
                'relations' => [],
                'fields' => [
                    ['name'=>'nama_lengkap','label'=>'Nama Lengkap','type'=>'text'],
                    ['name'=>'no_hp','label'=>'No HP','type'=>'text'],
                    ['name'=>'alamat','label'=>'Alamat Pelanggan','type'=>'textarea'],
                    ['name'=>'pekerjaan','label'=>'Pekerjaan','type'=>'text'],
                ],
                'columns' => [
                    ['key'=>'nama_lengkap','label'=>'Nama'],
                    ['key'=>'no_hp','label'=>'No HP'],
                    ['key'=>'alamat','label'=>'Alamat'],
                    ['key'=>'pekerjaan','label'=>'Pekerjaan'],
                ],
            ],

            'kendaraan' => [
                'title' => 'Data Kendaraan',
                'model' => Kendaraan::class,
                'relations' => ['pelanggan'],
                'fields' => [
                    ['name'=>'pelanggan_id','label'=>'Pemilik / Pelanggan','type'=>'select'],
                    ['name'=>'no_plat','label'=>'No Plat Kendaraan','type'=>'text'],
                    ['name'=>'jenis_kendaraan','label'=>'Jenis Kendaraan','type'=>'radio','options'=>['Matic','Manual Transmisi']],
                    ['name'=>'no_stnk','label'=>'No STNK','type'=>'text'],
                    ['name'=>'tahun_pembuatan','label'=>'Tahun Pembuatan','type'=>'number'],
                    ['name'=>'warna','label'=>'Warna Kendaraan','type'=>'text'],
                ],
                'columns' => [
                    ['key'=>'no_plat','label'=>'No Plat'],
                    ['key'=>'pelanggan.nama_lengkap','label'=>'Nama Pemilik'],
                    ['key'=>'jenis_kendaraan','label'=>'Jenis'],
                    ['key'=>'no_stnk','label'=>'No STNK'],
                    ['key'=>'tahun_pembuatan','label'=>'Tahun'],
                    ['key'=>'warna','label'=>'Warna'],
                ],
            ],

            'daftar-service' => [
                'title' => 'Daftar Service',
                'model' => DaftarService::class,
                'relations' => ['pelanggan','kendaraan'],
                'fields' => [
                    ['name'=>'pelanggan_id','label'=>'ID Pelanggan','type'=>'select'],
                    ['name'=>'kendaraan_id','label'=>'No Plat Kendaraan','type'=>'select'],
                    ['name'=>'keluhan','label'=>'Keluhan Kendaraan','type'=>'textarea'],
                    ['name'=>'tanggal_service','label'=>'Tanggal Service','type'=>'date'],
                ],
                'columns' => [
                    ['key'=>'id','label'=>'ID Service'],
                    ['key'=>'pelanggan.nama_lengkap','label'=>'Pelanggan'],
                    ['key'=>'kendaraan.no_plat','label'=>'No Plat'],
                    ['key'=>'keluhan','label'=>'Keluhan'],
                    ['key'=>'tanggal_service','label'=>'Tanggal'],
                ],
            ],

            'data-service' => [
                'title' => 'Data Service',
                'model' => DataService::class,
                'relations' => ['daftarService.kendaraan','daftarService.pelanggan'],
                'fields' => [
                    ['name'=>'daftar_service_id','label'=>'ID Service Pelanggan','type'=>'select'],
                    ['name'=>'estimasi_service','label'=>'Estimasi Service','type'=>'text'],
                    ['name'=>'nama_mekanik','label'=>'Nama Mekanik','type'=>'text'],
                    ['name'=>'sparepart_pengganti','label'=>'Sparepart Pengganti','type'=>'text'],
                ],
                'columns' => [
                    ['key'=>'daftar_service_id','label'=>'ID Service'],
                    ['key'=>'keluhan_kendaraan','label'=>'Keluhan Kendaraan'],
                    ['key'=>'estimasi_service','label'=>'Estimasi'],
                    ['key'=>'nama_mekanik','label'=>'Mekanik'],
                    ['key'=>'sparepart_pengganti','label'=>'Sparepart'],
                ],
            ],

            'pembayaran' => [
                'title' => 'Pembayaran Service',
                'model' => Pembayaran::class,
                'relations' => ['daftarService.kendaraan','daftarService.pelanggan'],
                'fields' => [
                    ['name'=>'daftar_service_id','label'=>'ID Service Pelanggan','type'=>'select'],
                    ['name'=>'biaya_service','label'=>'Jumlah Biaya Service','type'=>'number'],
                    ['name'=>'jenis_pembayaran','label'=>'Jenis Pembayaran','type'=>'radio','options'=>['Cash','Non Tunai']],
                    ['name'=>'keterangan','label'=>'Keterangan','type'=>'textarea'],
                ],
                'columns' => [
                    ['key'=>'daftar_service_id','label'=>'ID Service'],
                    ['key'=>'biaya_service','label'=>'Biaya'],
                    ['key'=>'jenis_pembayaran','label'=>'Pembayaran'],
                    ['key'=>'keterangan','label'=>'Keterangan'],
                ],
            ],
        ];

        abort_unless(isset($configs[$module]), 404);

        return $configs[$module];
    }

    private function options(): array
    {
        return [
            'pelanggan_id' => Pelanggan::all()->map(fn($p) => [
                'value' => $p->id,
                'label' => $p->id . ' - ' . $p->nama_lengkap,
                'nama' => $p->nama_lengkap,
            ])->toArray(),

            'kendaraan_id' => Kendaraan::with('pelanggan')->get()->map(fn($k) => [
    'value' => $k->id,
    'label' => $k->no_plat . ' - ' . ($k->pelanggan->nama_lengkap ?? ''),
    'pelanggan_id' => $k->pelanggan_id,
])->toArray(),

            'daftar_service_id' => DaftarService::with('kendaraan')->get()->map(fn($s) => [
                'value' => $s->id,
                'label' => 'Service #' . $s->id . ' - ' . ($s->kendaraan->no_plat ?? ''),
                'keluhan' => $s->keluhan,
            ])->toArray(),
        ];
    }

    private function rules(string $module, ?int $id = null): array
    {
        return match ($module) {
            'pelanggan' => [
                'nama_lengkap' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'alamat' => 'required|string',
                'pekerjaan' => 'required|string|max:255',
            ],

            'kendaraan' => [
                'pelanggan_id' => 'required|exists:pelanggan,id',
                'no_plat' => [
                    'required',
                    Rule::unique('kendaraan','no_plat')->ignore($id),
                ],
                'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
                'no_stnk' => 'required|string|max:255',
                'tahun_pembuatan' => 'required|integer|min:1900|max:'.(date('Y')+1),
                'warna' => 'required|string|max:100',
            ],

            'daftar-service' => [
                'pelanggan_id' => 'required|exists:pelanggan,id',
                'kendaraan_id' => 'required|exists:kendaraan,id',
                'keluhan' => 'required|string',
                'tanggal_service' => 'required|date',
            ],

            'data-service' => [
                'daftar_service_id' => [
                    'required',
                    'exists:daftar_services,id',
                    Rule::unique('data_services','daftar_service_id')->ignore($id),
                ],
                'estimasi_service' => 'required|string|max:255',
                'nama_mekanik' => 'required|string|max:255',
                'sparepart_pengganti' => 'nullable|string|max:255',
            ],

            'pembayaran' => [
                'daftar_service_id' => [
                    'required',
                    'exists:daftar_services,id',
                    Rule::unique('pembayaran_services','daftar_service_id')->ignore($id),
                ],
                'biaya_service' => 'required|numeric|min:0',
                'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
                'keterangan' => 'nullable|string',
            ],

            default => abort(404),
        };
    }

    private function prepareData(string $module, array $data): array
    {
        if ($module === 'daftar-service') {
            $valid = Kendaraan::where('id', $data['kendaraan_id'])
                ->where('pelanggan_id', $data['pelanggan_id'])
                ->exists();

            if (!$valid) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'kendaraan_id' => 'Kendaraan tidak sesuai dengan pelanggan.',
                ]);
            }
        }

        if ($module === 'data-service') {
            $service = DaftarService::findOrFail($data['daftar_service_id']);
            $data['keluhan_kendaraan'] = $service->keluhan;
        }

        return $data;
    }

    public function index(Request $request, string $module)
    {
        $config = $this->config($module);
        $model = $config['model'];

        $records = $model::with($config['relations'])
            ->latest()
            ->paginate(10);

        if ($request->is('api/*')) {
            return response()->json($records);
        }

        return view('crud.index', compact('config','records','module'));
    }

    public function create(string $module)
    {
        $config = $this->config($module);
        $fields = $config['fields'];
        $options = $this->options();
        $record = null;

        return view('crud.form', compact(
            'config','fields','options','record','module'
        ));
    }

    public function store(Request $request, string $module)
    {
        $config = $this->config($module);

        $data = $request->validate($this->rules($module));
        $data = $this->prepareData($module, $data);

        $model = $config['model'];
        $record = $model::create($data);

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $record,
            ], 201);
        }

        return redirect()->route('crud.index',$module)
            ->with('success','Data berhasil ditambahkan!');
    }

    public function edit(string $module, int $id)
    {
        $config = $this->config($module);
        $model = $config['model'];

        $record = $model::findOrFail($id);
        $fields = $config['fields'];
        $options = $this->options();

        return view('crud.form', compact(
            'config','fields','options','record','module'
        ));
    }

    public function update(Request $request, string $module, int $id)
    {
        $config = $this->config($module);
        $model = $config['model'];

        $record = $model::findOrFail($id);

        $data = $request->validate($this->rules($module,$id));
        $data = $this->prepareData($module, $data);

        $record->update($data);

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Data berhasil diperbarui',
                'data' => $record,
            ]);
        }

        return redirect()->route('crud.index',$module)
            ->with('success','Data berhasil diperbarui!');
    }

    public function show(Request $request, string $module, int $id)
    {
        $config = $this->config($module);
        $model = $config['model'];

        $record = $model::with($config['relations'])->findOrFail($id);

        return response()->json($record);
    }

    public function destroy(Request $request, string $module, int $id)
    {
        $config = $this->config($module);
        $model = $config['model'];

        $record = $model::findOrFail($id);
        $record->delete();

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Data berhasil dihapus',
            ]);
        }

        return redirect()->route('crud.index',$module)
            ->with('success','Data berhasil dihapus!');
    }
}
