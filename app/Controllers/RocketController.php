<?php
namespace App\Controllers;

use App\Models\RocketModel;
use CodeIgniter\API\ResponseTrait;

class RocketController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new RocketModel();
        $data['rockets'] = $model->findAll();
        return view('rockets/index', $data);
    }

    public function create()
    {
        return view('rockets/create');
    }



    public function store()
    {
        $model = new RocketModel();
        
        // Subir imagen
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/rockets/', $imageName);
        } else {
            $imageName = null;
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
            'active' => 1,
        ];

        $model->save($data);
        return redirect()->to('/rockets');
    }


    public function getSpaceXRockets()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->get('https://api.spacexdata.com/v4/rockets');
        $rockets = json_decode($response->getBody(), true);

        // Extraer solo la información necesaria
        $filteredRockets = [];
        foreach ($rockets as $rocket) {
            $filteredRockets[] = [
                'name' => $rocket['name'],
                'description' => $rocket['description'],
                'image' => $rocket['flickr_images'][0] ?? '', // Primera imagen disponible
            ];
        }

        return view('rockets/spacex', ['rockets' => $filteredRockets]);
    }


    public function delete($id)
    {
        $model = new RocketModel();
        $rocket = $model->find($id);

        if ($rocket) {
            // Eliminar la imagen del servidor
            $imagePath = 'uploads/rockets/' . $rocket['image'];
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath); // Borra la imagen del servidor
            }

            // Eliminar el cohete de la base de datos
            $model->delete($id);
        }

        return redirect()->to('/rockets')->with('success', 'Cohete eliminado correctamente.');
    }



    public function edit($id)
    {
        $model = new RocketModel();
        $rocket = $model->find($id);

        if (!$rocket) {
            return redirect()->to('/rockets')->with('error', 'Cohete no encontrado.');
        }

        return view('rockets/edit', ['rocket' => $rocket]);
    }



    public function update($id)
    {
        $model = new RocketModel();
        $rocket = $model->find($id);

        if (!$rocket) {
            return redirect()->to('/rockets')->with('error', 'Cohete no encontrado.');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'active' => $this->request->getPost('active') ?? 1,
        ];

        // Manejo de imagen si se sube una nueva
        if ($this->request->getFile('image')->isValid()) {
            $image = $this->request->getFile('image');
            $newName = $image->getRandomName();
            $image->move('uploads/rockets', $newName);

            // Eliminar la imagen anterior si existe
            if (!empty($rocket['image'])) {
                unlink('uploads/rockets/' . $rocket['image']);
            }

            $data['image'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('/rockets')->with('success', 'Cohete actualizado correctamente.');
    }




}
