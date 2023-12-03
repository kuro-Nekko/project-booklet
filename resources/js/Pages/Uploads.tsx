import { Head, Link } from "@inertiajs/react"

import { PlusCircle } from "lucide-react"

import { EmptyBooks } from "@/Components/empty-books"
import { buttonVariants } from "@/Components/ui/button"
import { cn } from "@/Lib/utils"

const Uploads = () => {
	return (
		<>
			<Head title="Uploads" />
			<div className="my-4 flex items-center justify-between">
				<h2 className="text-3xl font-bold tracking-tight">Add book</h2>
				<div className="flex items-center space-x-2">
					<Link
						href={route("uploads.addbook")}
						className={cn(buttonVariants({ size: "sm" }), "text-sm")}
					>
						<PlusCircle className="mr-2 h-5 w-5" />
						Upload book
					</Link>
				</div>
			</div>
			<EmptyBooks message="No books uploaded yet." />
		</>
	)
}

export default Uploads
