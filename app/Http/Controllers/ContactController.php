<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::orderBy('id', 'asc')->paginate(10);
        return response()->json([
            'contacts' => $contacts,
            'message' => 'contacts',
            'code' => 200
        ]);
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function saveContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_no = $request->contact_no;
        $contact->save();
        return response()->json([
            'messege' => 'contact create ',
            'code' => 200
        ]);
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json([
                'message' => 'contact Delete message backend',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "contact with id:$id does not exits"
            ]);
        }
    }

    // public function updateContact($id, Request $request)
    // {
    //     $contact = Contact::where('id', $id)->first();
    //     $contact->name = $request->name;
    //     $contact->email = $request->email;
    //     $contact->designation = $request->designation;
    //     $contact->contact_no = $request->contact_no;
    //     $contact->save();
    //     return response()->json([
    //         'messege' => 'contact update ',
    //         'code' => 200
    //     ]);
    // }


    public function updateContact($id, Request $request)
    {
        try {
            $contact = Contact::find($id);

            $contact->update($request->all());

            // $contact->update([
            //     'name' => $request->name,
            //     'email' => $request['email'],
            //     'designation' => $request->designation,
            //     'contact_no' => $request->contact_no
            // ]);

            return response()->json([
                'message' => 'Contacto actualizado correctamente desd el bakend',
                'code' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el contacto: ' . $e->getMessage(),
                'code' => 500
            ]);
        }
    }
}
