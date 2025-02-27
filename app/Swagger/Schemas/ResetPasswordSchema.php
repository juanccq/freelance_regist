<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="ResetPasswordRequest",
 *     type="object",
 *     title="Reset Password Request",
 *     description="Schema for reset password request",
 *     required={"token", "email", "password", "password_confirmation"},
 *     @OA\Property(property="token", type="string", example="reset-token", description="Password reset token"),
 *     @OA\Property(property="email", type="string", format="email", example="john@example.com",
 *      description="User's email address"),
 *     @OA\Property(property="password", type="string", format="password", example="newpass123",
 *      description="New password"),
 *     @OA\Property(property="password_confirmation", type="string", format="password", example="newpass123",
 *      description="Confirmation of the new password")
 * )
 *
 * @OA\Schema(
 *     schema="ResetPasswordSuccessResponse",
 *     type="object",
 *     title="Reset Password Success Response",
 *     description="Schema for successful password reset response",
 *     @OA\Property(property="message", type="string", example="Password reset successfully",
 *      description="Password reset success message")
 * )
 */

class ResetPasswordSchema
{
}
