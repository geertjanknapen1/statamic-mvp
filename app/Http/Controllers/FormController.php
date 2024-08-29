<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Statamic\Facades\Form;
use Statamic\Http\Controllers\FormController as StatamicFormController;
use Statamic\Http\Requests\FrontendFormRequest;
use Statamic\View\View as StatamicView;

class FormController extends StatamicFormController
{
    public function submitStatamicForm(Request $request, string $formHandle)
    {
        // Find the Statamic form by its handle.
        $form = Form::find($formHandle);

        if (is_null($form)) {
            return response()->json(['message' => "Form '$formHandle' not found"], Response::HTTP_NOT_FOUND);
        }

        // Statamic expects a FrontendFormRequest class for form submissions, so create one from request
        $frontendFormRequest = FrontendFormRequest::createFrom($request);

        // Submit the form through Statamics' 'submit' method.
        $response = parent::submit($frontendFormRequest, $form);

        // On success, update the content to include a rendered form confirmation view.
        // The view will have access to the "confirmation" entry and to the values submitted in the form.
        if ($response->getStatusCode() === Response::HTTP_OK) {
            $responseContent = $response->getOriginalContent();
            $confirmationSlug = Str::replace('_', '-', $formHandle);


            $responseContent['confirmation_slug'] = $confirmationSlug;

//            $confirmation = $this->formService->getFormConfirmation($confirmationSlug, $request['locale'] ?? 'en');
//
//            if (is_null($confirmation)) {
//                return response()->json(['message' => "Form confirmation '$confirmationSlug' not found"], Response::HTTP_NOT_FOUND);
//            }
//
//            $successView = StatamicView::make(
//                $confirmation->originValue('template'),
//                [
//                    'form' => $responseContent,
//                    'confirmation' => $confirmation,
//                ]
//            );
//
//            $responseContent['renderedSuccessView'] = $successView->render();
            $response->setContent($responseContent);
        }

        return $response;
    }
}
